<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ScheduleController extends Controller
{
    public function index()
    {
        // Jika ingin tampilkan hanya jadwal hari ini
        $today = Carbon::now()->translatedFormat('l'); // hasil: Senin, Selasa, ...
        $schedules = Schedule::where('day', $today)->get();

        return view('schedules.index', compact('schedules', 'today'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'day' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'nullable|string|max:255',
        ]);

        // Tambahkan user ID
        $validated['user_id'] = Auth::id();

        // Simpan ke database
        Schedule::create($validated);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }
}
