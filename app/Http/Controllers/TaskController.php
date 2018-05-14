<?php

namespace App\Http\Controllers;

use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('posts.index', compact('posts'));
    }

    public function show(Task $task)
    {

        return view('posts.show', compact('task'));
    }
}
