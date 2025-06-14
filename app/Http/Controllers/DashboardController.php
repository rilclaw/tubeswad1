<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Schedule;
use App\Models\Event;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
{
    $userId = Auth::id();

    // Jumlah tugas pending
    $taskCount = Task::where('user_id', $userId)
                    ->where('status', 'pending')
                    ->count();

    // Jumlah event organisasi
    $eventCount = Event::where('user_id', $userId)->count();

    // Jadwal kuliah hari ini
    $today = Carbon::now()->format('l');
    $todaySchedules = Schedule::where('user_id', $userId)
                            ->where('day', $today)
                            ->orderBy('start_time')
                            ->get();

    // ✅ Daftar 5 pengingat terbaru (tugas, organisasi, kuliah)
    $recentTasks = Task::where('user_id', $userId)
                        ->orderBy('due_date', 'asc')
                        ->take(5)
                        ->get();

    return view('dashboard', compact('taskCount', 'eventCount', 'todaySchedules', 'recentTasks'));
}
}
