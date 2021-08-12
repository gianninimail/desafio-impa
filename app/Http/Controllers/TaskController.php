<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTask;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    //
    //$PAGINATOR = 1;
    public function index() {

        return view('welcome');
    }

    public function all() {

        $user_id = Auth::user()->id;

        $tasks = Task::where('user_id', $user_id)->orderBy('title')->paginate(5);

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

        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.all');
        }

        $task->finish = true;
        $task->update();

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

    //ROTAS para acesso direto na API (RESTFull)
    public function apiGetAll() {

        $tasks = Task::all();
        if (!$tasks) {
            return response()->json(['Resposta' => 'Não existe nenhuma tarefa na Base de Dados!'], Response::HTTP_OK);
        }
        return $tasks;
    }

    public function apiGetById($id) {

        $task = Task::find($id);
        if (!$task) {
            return response()->json(['Resposta' => 'Tarefa com ID passado não existe!'], Response::HTTP_OK);
        }

        return $task;
    }

    public function apiDelete($id) {

        $task = Task::find($id);
        if (!$task) {
            return response()->json(['Resposta' => 'Tarefa com ID passado não existe!'], Response::HTTP_OK);
        }

        if($task->delete()) {
            return response()->json(['Resposta' => 'Tarefa deletada com sucesso!'], Response::HTTP_OK);
        }
    }

    public function apiUpdate(StoreUpdateTask $request, $id) {

        $task = Task::find($id);
        if (!$task) {
            return response()->json(['Resposta' => 'Tarefa com ID passado não existe!'], Response::HTTP_OK);
        }

        $task = $task->update($request->all());
        if ($task) {
            return response()->json(['Resposta' => 'Tarefa atualizada com sucesso!'], Response::HTTP_OK);
        }
    }

    public function apiComplete($id) {

        $task = Task::find($id);
        if (!$task) {
            return response()->json(['Resposta' => 'Tarefa com ID passado não existe!'], Response::HTTP_OK);
        }

        $task->finish = true;
        if ($task->update()) {
            return response()->json(['Resposta' => 'Tarefa atualizada com sucesso!'], Response::HTTP_OK);
        }
    }

    public function apiNew(StoreUpdateTask $request) {

        $task = Task::create($request->all());

        if (!$task) {
            return response()->json(['Resposta' => 'Erro ao criar uma nova tarefa!'], Response::HTTP_OK);
        }

        return $task;
    }


}
