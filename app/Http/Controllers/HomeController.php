<?php

namespace App\Http\Controllers;

use App\Content;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userid = Auth::id();
        $contents = Content::where('userid', $userid)->get();
        $usernames = array();
        foreach($contents as $content){
            $usernames[] = User::find($content['userid'])['name'];
        }
        return view('home', ['contents' => $contents, 'usernames' => $usernames]);
    }
}
