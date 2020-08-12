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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
