<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;



class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::latest()->get();

    return view('tasks.index', compact('tasks'));
}
    public function fixStatus()
    {
        Task::whereNull('status')->update(['status' => 'pending']);

        return redirect()->route('tasks.index');
    }

    public function create()
    {
        return view('tasks.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'priority' => 'required|in:low,medium,high',
        'status' => 'required|in:pending,completed',
        'due_date' => 'nullable|date',
    ]);

    Task::create($validated);

    return redirect()->route('tasks.index')
                     ->with('success', 'Task created successfully');
}


    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

  public function update(UpdateTaskRequest $request, Task $task)
{
    $task->update($request->validated());
    return redirect()->route('tasks.index')->with('success', 'Task updated');
}
public function complete(Task $task)
{
    $task->update([
        'status' => 'completed'
    ]);

    return redirect()
        ->route('tasks.index')
        ->with('success', 'Task marked as completed');
}

public function toggleStatus(Task $task)
{
    $task->status = $task->status === 'pending' ? 'completed' : 'pending';
    $task->save();

    return redirect()->back()->with('success', 'Task status updated!');
}
public function dashboard()
{
    return view('dashboard', [
        'total' => Task::count(),
        'pending' => Task::where('status', 'pending')->count(),
        'completed' => Task::where('status', 'completed')->count(),
        'overdue' => Task::where('status', 'pending')
                          ->whereDate('due_date', '<', Carbon::today())
                          ->count(),
    ]);
}

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}

