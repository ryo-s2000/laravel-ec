<?php

use App\User;
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
    // TODO: もう少し効率的なやり方で
    $usernames = array();
    foreach($contents as $content){
        $usernames[] = User::find($content['userid'])['name'];
    }
    return view('top', ['contents' => $contents, 'usernames' => $usernames]);
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
    // TODO: もう少し効率的なやり方で
    $username = User::find($content['userid'])['name'];
    return view('show', ['content' => $content, 'username' => $username]);
});

Route::get('/{contentid}/edit', function () {
    // TODO: 認証をかける
    return view('content');
});
