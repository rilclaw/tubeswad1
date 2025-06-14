<?php

namespace App\Http\Controllers;

use App\Models\DailyNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyNoteController extends Controller
{
    public function index()
    {
        $notes = DailyNote::where('user_id', Auth::id())->orderBy('note_date', 'desc')->get();
        return view('daily_notes.index', compact('notes'));
    }

    public function create()
    {
        return view('daily_notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'note_date' => 'required|date',
        ]);

        DailyNote::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'note_date' => $request->note_date,
        ]);

        return redirect()->route('daily-notes.index')->with('success', 'Catatan berhasil ditambahkan.');
    }

    public function edit(DailyNote $dailyNote)
    {
        $this->authorize('update', $dailyNote);
        return view('daily_notes.edit', compact('dailyNote'));
    }

    public function update(Request $request, DailyNote $dailyNote)
    {
        $this->authorize('update', $dailyNote);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'note_date' => 'required|date',
        ]);

        $dailyNote->update($request->only(['title', 'content', 'note_date']));

        return redirect()->route('daily-notes.index')->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy(DailyNote $dailyNote)
    {
        $this->authorize('delete', $dailyNote);
        $dailyNote->delete();

        return redirect()->route('daily-notes.index')->with('success', 'Catatan berhasil dihapus.');
    }
}
                                    