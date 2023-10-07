<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/todos', function () {
//     return 'halaman dashboard todo';
// });

/**
 * Add Todo
 */
Route::post('/todos', function () {
    //
});
// Route::post('/todos/dashboard', function () {
//     //
// });
/**
 * Show edit todo
 */
Route::get('todos/{todo}', function () {
});

/**
 * update todo
 */
Route::put('todos/{todo}', function () {
});

/**
 * Delete Todo
 */
Route::delete('/todos/{todo}', function () {
    //
});
Route::get('/', 'TodoController@index');

/**
 *  Show create todo form
 */
Route::get('/todos/create', 'TodoController@create');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Route::get('/todos/dashboard', 'TodoController@dashboard');
// Route::get('/todos/dashboard', [\App\Http\Controllers\LoginController::class, 'dashboard'])->name('dashboard');

/**
 * Add Todo
 */
Route::post('/todos', 'TodoController@store');

/**
 * Show edit todo
 */
Route::get('todos/{todo}/edit', 'TodoController@edit');
Route::get('/exportexcel', [TodoController::class, 'exportexcel'])->name('exportexcel');
/**
 * update todo
 */
Route::put('todos/{todo}', 'TodoController@update');

/**
 * Delete Todo
 */
Route::get('/todos/{todo}/delete', 'TodoController@delete');

// Route::get('/', function () {
//     return view('welcome');
// });

// //show Todo Dashboard
// Route::get('/', 'TodoController@index');

// //show create todo form

// Route::get('/todos/create', 'TodoController@create');
// /**
//  * Add Todo
//  */
// Route::post('/todos', 'TodoController@store');

// /**
//  * Show edit todo
//  */
// Route::get('todos/{todo}/edit', 'TodoController@edit');

// /**
//  * update todo
//  */
// Route::put('todos/{todo}', 'TodoController@update');

// /**
//  * Delete Todo
//  */
// Route::get('/todos/{todo}/delete', 'TodoController@delete');

// Route::get('/todos', function () {
//     return 'halaman dashboard todo';
// });
// //Add todo
// Route::post('/todos', function () {
// });
// //show edit
// Route::get('todos/{todo}', function () {
// });
// //update todo
// Route::get('todos/{todo}', function () {
// });
// //delete todo
// Route::delete('/todos/{todo}', function () {
// });
Route::resource('/todo', \App\Http\Controllers\TodoController::class);

// Route::get('/approval', [\App\Http\Controllers\TodoController::class, 'approval'])->name('approval');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');

Route::post('actionlogin', [\App\Http\Controllers\LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [\App\Http\Controllers\TodoController::class, 'index'])->name('home')->middleware('auth');

Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
