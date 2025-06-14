<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Tampilkan semua task milik user yang login
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    // Form tambah task baru
    public function create()
    {
        return view('tasks.create');
    }

    // Simpan task ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:tugas,organisasi,kuliah',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,completed',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil dibuat!');
    }

    // Lihat detail task
    public function show($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.show', compact('task')); // ← ini juga
    }


    // Form edit
    public function edit($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.edit', compact('task')); // ← ini penting
    }


    // Simpan update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:tugas,organisasi,kuliah',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,completed',
        ]);

        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui!');
    }

    // Hapus task
    public function destroy($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus!');
    }
}
