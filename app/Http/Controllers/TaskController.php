<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $listTask = Task::all();
        return view('tasks.index', compact('listTask'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $data = array_merge($request->all(), [
            'user_id' => Auth::id(),
        ]);

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Create task successfully.');
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(StoreTaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        $data = $request->all();
        unset($data['id']);
        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Update task successfully.');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Delete task successfully.');
    }
}
