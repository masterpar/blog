<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Post $post)		
    {
    	$this->validate(request(),[

    		'photo' => 'image|max:2048'
    	]);

    	$photo = request()->file('photo')->store('public');


    	Photo::create([
    		'url' => Storage::url($photo),
    		'post_id' => $post->id,

    	]);
	}

    public function destroy(Photo $photo)
    {
        $photo->delete(); //elimina de la bade de datos
        $photoPath = str_replace('storage', 'public', $photo->url);
        Storage::delete($photoPath); //elimina del servidor

        return back()->with('flash','Foto Eliminada');
    }
}
