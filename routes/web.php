<?php

use App\Content;
use Illuminate\Http\Request;

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
    $contents = Content::all();
    return view('top', ['contents' => $contents]);
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/new', function () {
    return view('content');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{contentid}', function ($contentid) {
    $content = Content::find($contentid);
    return view('show', ['content' => $content]);
});

Route::get('/{contentid}/edit', function () {
    // TODO: 認証をかける
    return view('content');
});
