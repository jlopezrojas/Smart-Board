<?php

use App\Models\PostIt;
use App\Models\Task;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post-its', App\Http\Controllers\PostItController::class);
Route::resource('tasks', App\Http\Controllers\TaskController::class);
Route::get('/paneles', function () {
    $tasks = Task::all();
    $postIts = PostIt::all();
    return view('paneles.index', compact('tasks', 'postIts'));
});