<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Menampilkan semua event milik user yang sedang login
    public function index()
    {
        $events = Event::where('user_id', Auth::id())->latest()->get();
        return view('events.index', compact('events'));
    }

    // Tampilkan form untuk membuat event baru
    public function create()
    {
        return view('events.create');
    }

    // Simpan event baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'description' => 'nullable|string',
        ]);

        Event::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'description' => $request->description,
        ]);

        return redirect()->route('events.index')->with('success', 'Event berhasil dibuat.');
    }

    // Tampilkan detail event tertentu
    public function show(Event $event)
    {
        $this->authorize('view', $event);
        return view('events.show', compact('event'));
    }

    // Tampilkan form untuk mengedit event
    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        return view('events.edit', compact('event'));
    }

    // Simpan perubahan pada event yang telah diedit
    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'description' => 'nullable|string',
        ]);

        $event->update($request->only('title', 'start_time', 'end_time', 'description'));

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui.');
    }

    // Hapus event dari database
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus.');
    }
}
