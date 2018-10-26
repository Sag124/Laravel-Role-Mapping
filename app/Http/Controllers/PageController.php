<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Role;

class PageController extends Controller
{
    public function getIndex()
    {
        $posts = Post::all();
    	return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
    	return view('pages.about');
    }

    public function getContact()
    {
    	return view('pages.contact');
    }

    public function getAdmin()
    {
        $users = User::all();
        return view('admin.index')->withUsers($users);
    }

    public function getAuthor()
    {
        return view('author.index');
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'user')->first());
        }
        if ($request['role_author']) {
            $user->roles()->attach(Role::where('name', 'author')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }
        return redirect()->back();
    }


    
}
