<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
        public function index(Request $request)
    {
        $query = Task::query();

        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        //$tasks = $query->get();
        $tasks = $query->paginate(5)->withQueryString();
        return view('tasks.index', compact('tasks'));
    }
        public function create()
    {
        return view('tasks.create');
    }
        public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:Completed,Pending',
    ]);

    try {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect('/')
            ->with('success', 'Task created successfully.');

    } catch (\Exception $e) {

        \Log::error('Task creation failed: ' . $e->getMessage());

        return redirect()->back()
            ->withInput()
            ->with('error', 'Unable to create the task. Please try again.');
    }
}

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:Completed,Pending',
    ]);

    $task = Task::findOrFail($id);

    try {
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect('/')
            ->with('success', 'Task updated successfully.');

    } catch (\Throwable $e) {

        \Log::error('Task update failed: ' . $e->getMessage());

        return redirect()->back()
            ->withInput()
            ->with('error', 'Unable to update the task. Please try again.');
    }
}
    public function destroy($id)
{
    $task = Task::findOrFail($id);

    try {
        $task->delete();

        return redirect('/')
            ->with('success', 'Task deleted successfully.');

    } catch (\Throwable $e) {

        \Log::error('Task deletion failed: ' . $e->getMessage());

        return redirect('/tasks')
            ->with('error', 'Unable to delete the task. Please try again.');
    }
}
}
