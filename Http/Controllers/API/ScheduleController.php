<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        return response()->json(Schedule::where('user_id', Auth::id())->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'day' => 'nullable|string',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'location' => 'nullable|string|max:255'
        ]);

        $validated['user_id'] = Auth::id();
        $schedule = Schedule::create($validated);

        return response()->json($schedule, 201);
    }

    public function show($id)
    {
        $schedule = Schedule::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return response()->json($schedule);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'course_name' => 'sometimes|required|string|max:255',
            'day' => 'nullable|string',
            'start_time' => 'sometimes|required',
            'end_time' => 'sometimes|required|after:start_time',
            'location' => 'nullable|string|max:255'
        ]);

        $schedule->update($validated);
        return response()->json($schedule);
    }

    public function destroy($id)
    {
        $schedule = Schedule::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $schedule->delete();

        return response()->json(['message' => 'Schedule deleted successfully']);
    }
}
