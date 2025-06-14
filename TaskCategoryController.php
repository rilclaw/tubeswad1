<?php

namespace App\Http\Controllers;

use App\Models\TaskCategory;
use Illuminate\Http\Request;

class TaskCategoryController extends Controller
{
    public function index()
    {
        $categories = TaskCategory::all();
        return view('task_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('task_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        TaskCategory::create($request->all());

        return redirect()->route('task-categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(TaskCategory $taskCategory)
    {
        return view('task_categories.edit', compact('taskCategory'));
    }

    public function update(Request $request, TaskCategory $taskCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $taskCategory->update($request->all());

        return redirect()->route('task-categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(TaskCategory $taskCategory)
    {
        $taskCategory->delete();
        return redirect()->route('task-categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
                                                            