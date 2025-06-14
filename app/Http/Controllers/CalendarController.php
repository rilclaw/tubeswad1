<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function events()
{
    $userId = Auth::id();


    $tasks = \App\Models\Task::where('user_id', $userId)
        ->whereNotNull('due_date')
        ->get()
        ->map(function ($task) {
            $className = match ($task->category) {
                'tugas' => 'booking-event',       // akan jadi class CSS
                'organisasi' => 'no-booking',
                'kuliah' => 'booking-event',
                default => 'no-booking',
            };

            return [
                'title' => '[' . ucfirst($task->category) . '] ' . $task->title,
                'start' => $task->due_date,
                'url' => route('tasks.show', $task->id),
                'className' => $className, // class CSS custom
            ];
        });

    return response()->json($tasks->values());
}


    public function index()
    {
        return view('calendar.index');
    }
}
