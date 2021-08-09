<?php

use App\Http\Controllers\{
    TaskController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/tasks', [TaskController::class, 'all'])->name('tasks.all');
Route::get('/tasks/new_task', [TaskController::class, 'new_task'])->name('tasks.new');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::delete('/tasks/{id}', [TaskController::class, 'delete'])->name('tasks.delete');
Route::get('/tasks/edit_task/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

//$router->get('/tasks', 'TaskController@all');


$router->get('/api/', function () use ($router) {
    return ["description: API de dados do Desafio proposto pelo IMPA para Edital.",
        "version: 1",
        "homepage: ",
        "keywords: 'php', 'lumen', 'api', 'rest', 'server, 'http', 'json', 'mapaosc', 'ipea'",
        "license: LGPL-3.0",
        "authors: {Thiago Giannini Ramos}"
    ];
});
