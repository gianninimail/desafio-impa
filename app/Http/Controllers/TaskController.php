<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTask;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index() {

        return view('welcome');
    }

    public function all() {

        $tasks = Task::all();

        return view('task.all', compact('tasks'));
    }

    public function show($id) {

        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.all');
        }

        return view('task.show', compact('task'));
    }

    public function new_task() {
        return view('task.new');
    }

    public function store(StoreUpdateTask $request) {

        $task = Task::create($request->all());

        return redirect()->route('tasks.all');
    }

    public function delete($id) {

        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.all');
        }

        $task->delete();

        return redirect()->route('tasks.all')->with('msg', 'Task deleted success!');
    }

    public function completed($id) {

        dd('completando...');

        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.all');
        }

        $task->delete();

        return redirect()->route('tasks.all');
    }

    public function edit($id) {

        $task = Task::find($id);
        if (!$task) {
            return redirect()->back();
        }

        return view('task.edit', compact('task'));
    }

    public function update($id) {

        $task = Task::find($id);
        if (!$task) {
            return redirect()->back();
        }

        return view('task.edit', compact('task'));
    }
}
