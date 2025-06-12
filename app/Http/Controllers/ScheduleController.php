<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // Menampilkan daftar jadwal
    public function index()
    {
        return view('schedule.index');
    }

    // Menampilkan form tambah jadwal baru
    public function create()
    {
        return view('schedule.create');
    }

    // Menyimpan data jadwal baru (request dari form create)
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // tambahkan field lain sesuai kebutuhan
        ]);

        // Simpan data ke database (jika sudah ada model Schedule)
        // Schedule::create($validated);

        // Redirect ke halaman jadwal dengan pesan sukses
        return redirect()->route('schedule.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    // Menampilkan detail jadwal
    public function show($id)
    {
        // $schedule = Schedule::findOrFail($id);
        // return view('schedule.show', compact('schedule'));

        // Jika belum ada model, bisa return view placeholder dulu
        return view('schedule.show');
    }

    // Menampilkan form edit jadwal
    public function edit($id)
    {
        // $schedule = Schedule::findOrFail($id);
        // return view('schedule.edit', compact('schedule'));

        return view('schedule.edit');
    }

    // Update data jadwal
    public function update(Request $request, $id)
    {
        // Validasi dan update data
        // $schedule = Schedule::findOrFail($id);
        // $schedule->update($request->all());

        return redirect()->route('schedule.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    // Hapus jadwal
    public function destroy($id)
    {
        // $schedule = Schedule::findOrFail($id);
        // $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
