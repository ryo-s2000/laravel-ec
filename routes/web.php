<?php

use App\User;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'ContentsController@top');

Route::get('/search', 'ContentsController@search');

Route::get('/new', 'ContentsController@new')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{contentid}', 'ContentsController@show');

Route::post('/newcontent', 'ContentsController@newcontent')->middleware('auth');

Route::post('/{contentid}/newcomment', 'ContentsController@newcomment')->middleware('auth');

Route::get('/{contentid}/edit', 'ContentsController@editview')->middleware('auth');

Route::post('/{contentid}/edit', 'ContentsController@editsave')->middleware('auth');

Route::delete('/{contentid}/delete', 'ContentsController@delete')->middleware('auth');
