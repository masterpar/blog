<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    

    public function home()
    {

    	$posts=Post::Publicado()->get();    

		return view('welcome',compact('posts'));
    }
}
