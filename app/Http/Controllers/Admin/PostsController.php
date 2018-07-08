<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
    	$categories = Category::all();
    	return view('admin.posts.create', compact('categories','tags'));
    }

    public function store(Request $request)
    {
       //return  $request->all();

        //validar
        $post = new Post;
        $post->titulo = $request->titulo;
        $post->contenido = $request->contenido;
        $post->resumen = $request->resumen;
        $post->publicado_en = Carbon::parse($request->publicado_en);
        $post->category_id = $request->category;
        //etiquetas
        $post->save();

        $post->tags()->attach($request->tags);
        return back()->with('flash','Tu publicación a sido creada!');

    }
}
