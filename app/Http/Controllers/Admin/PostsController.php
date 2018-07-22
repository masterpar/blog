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
        $this->validate($request, ['titulo' => 'required']);
        $post =new  Post;
        $post->titulo =  $request->get('titulo');
        $post->url =  str_slug($request->get('titulo'));
        $post->save();

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
         $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories','tags','post'));
    }



    public function update(Post $post, Request $request)
    {
      
        $this->validate($request, [
            'titulo' => 'required',
            'contenido' => 'required',
            'category' => 'required',
            'resumen' => 'required'
        ]);

        $post->titulo = $request->titulo;
        $post->url = str_slug($request->titulo);
        $post->contenido = $request->contenido;
        $post->resumen = $request->resumen;
        $post->publicado_en = $request->publicado_en!= null ? Carbon::parse($request->publicado_en) : null ;
        $post->category_id = $request->category;
        //etiquetas
        $post->save();

        $post->tags()->sync($request->get('tags'));
        return back()->with('flash','Tu publicación a sido guardada!');

    }
}
