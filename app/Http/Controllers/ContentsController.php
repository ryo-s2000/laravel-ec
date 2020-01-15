<?php

namespace App\Http\Controllers;

use Storage;
use App\User;
use App\Content;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentsController extends Controller
{
    public function top(){
        $contents = Content::all();
        $usernames = array();
        foreach($contents as $content){
            $usernames[] = User::find($content['userid'])['name'];
        }
        return view('top', ['contents' => $contents, 'usernames' => $usernames]);
    }

    public function new(){
        $datetime = date("Y-m-d", strtotime('+1 day'));
        return view('content', ['datetime' => $datetime]);
    }

    public function search(Request $request){
        $validatedData = $request->validate([
            'keyword' => 'required',
        ]);

        $keyword = $request->keyword;
        // NOTE: タイトル、説明文で検索
        $contents = Content::where('title', 'LIKE', "%{$keyword}%")->orWhere('description', 'LIKE', "%{$keyword}%")->get();
        $selectnew = "";
        $selectold = "";
        $selectcheap = "";
        $selectexpensive = "";
        $sort = $request->sort;
        switch ($sort){
            case "new":
                $contents = $contents->sortByDesc('release');
                $selectnew = "selected";
            break;
            case "old":
                $contents = $contents->sortBy('release');
                $selectold = "selected";
            break;
            case "cheap":
                $contents = $contents->sortBy('price');
                $selectcheap = "selected";
            break;
            case "expensive":
                $contents = $contents->sortByDesc('price');
                $selectexpensive = "selected";
            break;
        }
        $usernames = array();
        foreach($contents as $content){
            $usernames[] = User::find($content['userid'])['name'];
        }

        return view('search', ['contents' => $contents, 'usernames' => $usernames, 'keyword' => $keyword, "selectnew" => $selectnew, "selectold" => $selectold, "selectcheap" => $selectcheap, "selectexpensive" => $selectexpensive]);
    }

    public function show($contentid){
        $content = Content::find($contentid);
        $comments = Comment::where('contentid', $contentid)->get();
        $commentusernames = array();
        foreach($comments as $comment){
            $commentusernames[] = User::find($comment['userid'])['name'];
        }
        $username = User::find($content['userid'])['name'];
        return view('show', ['content' => $content, 'username' => $username, 'comments' => $comments, 'commentusernames' => $commentusernames]);
    }

    public function newcontent(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required',
            'datetime' => 'required',
            'file' => 'required'
        ]);

        $content = new Content;
        $content->title = $request->title;
        $userid = Auth::id();
        $content->userid = $userid;
        $content->description = $request->description;
        $content->price = $request->price;
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        $content->imagespath = Storage::disk('s3')->url($path);
        $content->release = date( 'Y-m-d H:i:s', strtotime( $request->datetime ));
        $content->save();

        return redirect('/home');
    }

    public function newcomment($contentid, Request $request){
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->title = $request->commenttitle;
        $comment->contentid = $contentid;
        $userid = Auth::id();
        $comment->userid = $userid;
        $comment->save();

        return redirect($contentid);
    }

    public function delete(Content $contentid){
        // WARNING:　現在のユーザーと、作成ユーザーが違くても削除できる
        $contentid->delete();

        return redirect('/home');
    }

    public function editsave(Request $request, $contentid){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required',
            'datetime' => 'required'
        ]);
        // WARNING:　現在のユーザーと、作成ユーザーが違くても編集できる

        $content = Content::find($contentid);
        $form = $request->all();

        if($request->file('file')){
            $file = $request->file('file');
            $path = Storage::disk('s3')->putFile('/', $file, 'public');
            $form['imagespath'] = Storage::disk('s3')->url($path);
        }

        $form['release'] = date( 'Y-m-d H:i:s', strtotime( $request->datetime ));
        unset($form['_token']);
        $content->fill($form)->save();

        return redirect('/home');
    }

    public function editview($contentid){
        // WARNING:　現在のユーザーと、作成ユーザーが違くても編集できる
        $content = Content::find($contentid);
        return view('content', ['content' => $content]);
    }
}
