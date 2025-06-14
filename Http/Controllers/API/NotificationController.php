<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return response()->json(Notification::where('user_id', Auth::id())->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $validated['user_id'] = Auth::id();
        $notification = Notification::create($validated);

        return response()->json($notification, 201);
    }

    public function show($id)
    {
        $notification = Notification::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return response()->json($notification);
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'message' => 'sometimes|required|string'
        ]);

        $notification->update($validated);
        return response()->json($notification);
    }

    public function destroy($id)
    {
        $notification = Notification::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $notification->delete();

        return response()->json(['message' => 'Notification deleted successfully']);
    }
}
