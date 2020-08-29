<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    // return config('services.ses.key');
    // return env('APP_NAME');
    return view('welcome');
});

Route::get('/user', 'UserController@index');

// Route::post('/upload', function () {
//     dd(request()->all());
// });
// Route::post('/upload', function (Request $request) {
//     // dd($request->hasFile('image'));
//     //image = name form, photo = buat folder, public = simpan di folder public
//     $request->image->store('photo', 'public');
//     return 'Uploaded';
// });

Route::post('/upload', 'UserController@uploadAvatar');

//Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Todos
// Route::get('/todos', 'TodoController@index')->name('todos.index');
// Route::get('/todos/create', 'TodoController@create');
// Route::post('/todos/create', 'TodoController@store');
// Route::get('/todos/{todo}/edit', 'TodoController@edit');
// Route::patch('/todos/{todo}/update', 'TodoController@update')->name('todos.update');
// Route::delete('/todos/{todo}/delete', 'TodoController@delete')->name('todos.delete');



// Route::middleware('auth')->group(function () {

Route::resource('/todos', 'TodoController');

Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todos.complete');
Route::delete('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todos.incomplete');
// });
