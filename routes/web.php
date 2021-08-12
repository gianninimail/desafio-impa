<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TaskController
};
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
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'all'])->name('tasks.all');
    Route::get('/tasks/new_task', [TaskController::class, 'new_task'])->name('tasks.new');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
    Route::delete('/tasks/{id}', [TaskController::class, 'delete'])->name('tasks.delete');
    Route::get('/tasks/edit_task/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::put('/tasks/completed/{id}', [TaskController::class, 'completed'])->name('tasks.completed');
    Route::any('/tasks/search', [TaskController::class, 'search'])->name('tasks.search');
});

//ROTAS Diretas
Route::get('/api/tasks/', [TaskController::class, 'apiGetAll']);
Route::get('/api/tasks/user/{id}', [TaskController::class, 'apiGetAllByUser']);
Route::get('/api/tasks/{id}', [TaskController::class, 'apiGetById']);
Route::put('/api/tasks/update/{id}', [TaskController::class, 'apiUpdate']);
Route::put('/api/tasks/complete/{id}', [TaskController::class, 'apiComplete']);
Route::post('/api/tasks', [TaskController::class, 'apiNew']);
Route::delete('/api/tasks/{id}', [TaskController::class, 'apiDelete']);
Route::get('/api/token', function () { return csrf_token();});


//Route::any('/login', [TaskController::class, 'login'])->name('login');
//Route::any('/register', [TaskController::class, 'login'])->name('register');

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
