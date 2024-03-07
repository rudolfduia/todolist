<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoCoontroller;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('todos/index',[TodoCoontroller::class,'index'])->name('todos.index');
Route::get('todos/create',[TodoCoontroller::class,'create'])->name('todos.create');
Route::post('todos/store',[TodoCoontroller::class,'store'])->name('todos.store');
Route::get('todos/show/{id}',[TodoCoontroller::class,'show'])->name('todos.show');
Route::get('todos/completed/{id}',[TodoCoontroller::class,'completed'])->name('todos.completed');
Route::get('todos/notcompleted/{id}',[TodoCoontroller::class,'notcompleted'])->name('todos.notcompleted');
Route::get('todos/Delete/{id}',[TodoCoontroller::class,'Delete'])->name('todos.Delete');
Route::get('todos/edit/{id}',[TodoCoontroller::class,'edit'])->name('todos.edit');
Route::put('todos/update/{id}',[TodoCoontroller::class,'update'])->name('todos.update');


