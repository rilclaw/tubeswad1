<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // WAJIB: Pastikan semua fungsi hanya untuk user yang login
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampilkan semua task milik user yang login
    public function index()
    {
        $userId = Auth::id(); // atau auth()->id()
        $tasks = Task::where('user_id', $userId)->get();

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

        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login')->withErrors('Session tidak ditemukan. Silakan login ulang.');
        }

        Task::create([
            'user_id' => $userId,
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
        return view('tasks.show', compact('task'));
    }

    // Form edit task
    public function edit($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    // Simpan update task
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
        $task->update($request->only(['title', 'category', 'description', 'due_date', 'status']));

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
