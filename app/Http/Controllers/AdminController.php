<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Admin;
use App\Post;
use DB;
use Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $users = DB::table('users')->latest()->get();
        $users = User::orderBy('id', 'desc')->paginate(5);
        $posts = Post::orderBy('id', 'desc')->paginate(2);
        return view('admin')->withUsers($users)->withPosts($posts);
    }

    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        Session::flash('success', 'The Selected User was Successfully deleted');

        return redirect()->route('admin.dashboard');
    }
}
