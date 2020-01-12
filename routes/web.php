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

Route::get('/', function () {
    $contents = Content::all();
    $usernames = array();
    foreach($contents as $content){
        $usernames[] = User::find($content['userid'])['name'];
    }
    return view('top', ['contents' => $contents, 'usernames' => $usernames]);
});

Route::get('/search', function (Request $request) {
    $validatedData = $request->validate([
        'keyword' => 'required',
    ]);

    $keyword = $request->keyword;
    // NOTE: タイトルで検索しているだけ
    $contents = Content::where('title', 'LIKE', "%{$keyword}%")->get();
    $usernames = array();
    foreach($contents as $content){
        $usernames[] = User::find($content['userid'])['name'];
    }

    return view('search', ['contents' => $contents, 'usernames' => $usernames, 'keyword' => $keyword]);
});

Route::get('/new', function () {
    $datetime = date("Y-m-d", strtotime('+1 day'));
    return view('content', ['datetime' => $datetime]);
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{contentid}', function ($contentid) {
    $content = Content::find($contentid);
    $username = User::find($content['userid'])['name'];
    return view('show', ['content' => $content, 'username' => $username]);
});

Route::get('/{contentid}/edit', function ($contentid) {
    // WARNING:　現在のユーザーと、作成ユーザーが違くても編集できる
    $content = Content::find($contentid);
    return view('content', ['content' => $content]);
})->middleware('auth');

Route::post('/newcontent', function(Request $request) {
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'price' => 'required|max:255',
        'description' => 'required',
        'datetime' => 'required'
    ]);

    $content = new Content;
    $content->title = $request->title;
    $userid = Auth::id();
    $content->userid = $userid;
    $content->description = $request->description;
    $content->price = $request->price;
    // TODO 画像表示処理を作成
    $content->imagespath = "";
    $content->release = date( 'Y-m-d H:i:s', strtotime( $request->datetime ));
    $content->save();

    return redirect('/home');
})->middleware('auth');

Route::post('/{contentid}/edit', function (Request $request, $contentid) {
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'price' => 'required|max:255',
        'description' => 'required',
        'datetime' => 'required'
    ]);
    // WARNING:　現在のユーザーと、作成ユーザーが違くても編集できる

    $content = Content::find($contentid);
    $form = $request->all();
    $form['release'] = date( 'Y-m-d H:i:s', strtotime( $request->datetime ));
    print_r($form);
    unset($form['_token']);
    $content->fill($form)->save();

    return redirect('/home');
})->middleware('auth');

Route::delete('/{contentid}/delete', function (Content $contentid) {
    // WARNING:　現在のユーザーと、作成ユーザーが違くても削除できる
    $contentid->delete();

    return redirect('/home');
})->middleware('auth');
