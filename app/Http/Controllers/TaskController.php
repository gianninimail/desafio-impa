<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTask;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    //$PAGINATOR = 1;
    public function index() {

        return view('welcome');
    }

    public function all() {

        $tasks = Task::orderBy('title')->paginate(5);

        return view('task.dash', compact('tasks'));
    }

    public function search(Request $request) {

        $fields = $request->except('_token');

        $filter = $request->filter;
        //dd($filter);
        $tasks = Task::where('title', '=', $filter)->orWhere('title', 'LIKE', "%{$filter}%")->paginate(5);
        //$tasks = Task::where('title', '=', $filter)->orWhere('title', 'LIKE', "%{$filter}%")->toSql();
        //dd($tasks);

        return view('task.dash', compact('tasks', 'fields'));
    }

    public function show($id) {

        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.all');
        }

        return view('task.details', compact('task'));
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

        return view('task.update', compact('task'));
    }

    public function update(StoreUpdateTask $request, $id) {

        $task = Task::find($id);
        if (!$task) {
            return redirect()->back();
        }

        $task->update($request->all());

        return redirect()->route('tasks.all')->with('msg', 'Task updated success!');
    }
}
