<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // CREATE
    public function store()
    {
        Task::create([
            'title' => 'Learn Eloquent',
            'is_done' => false,
        ]);
        return "Task created!";
    }

    // READ (all tasks)
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // READ (one task)
    public function show($id)
    {
        $task = Task::find($id);
        return "Task: " . $task->title;
    }

     // UPDATE
    public function markDone($id)
    {
        $task = Task::find($id);
        $task->is_done = true;
        $task->save();
        return "Task marked as done!";
    }

    // DELETE
    public function destroy($id)
    {
        Task::destroy($id);
        return "Task deleted!";
    }
}
