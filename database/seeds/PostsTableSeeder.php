<?php

use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Post::truncate();

    	$category = new Category;
    	$category->nombre = "categoria 1";
    	$category->save();

    	$category = new Category;
    	$category->nombre = "categoria 2";
    	$category->save();

        $post = new Post;
        $post->titulo = "Mi primer Post";
        $post->url = str_slug("Mi primer Post");
        $post->resumen = "Resumen de Mi primer Post";
        $post->contenido = "Cotenido de Mi primer Post";
        $post->publicado_en = Carbon::now()->subDays(5);
        $post->category_id = 1;
        $post->save();

        $post = new Post;
        $post->titulo = "Mi segundo Post";
        $post->url = str_slug("Mi segundo Post");
        $post->resumen = "Resumen de Mi segundo Post";
        $post->contenido = "Cotenido de Mi segundo Post";
        $post->publicado_en = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->save();

        $post = new Post;
        $post->titulo = "Mi tercer Post";
        $post->url = str_slug("Mi tercer Post");
        $post->resumen = "Resumen de Mi tercer Post";
        $post->contenido = "Cotenido de Mi tercer Post";
        $post->publicado_en = Carbon::now()->subDays(3);
        $post->category_id = 1;
        $post->save();

        $post = new Post;
        $post->titulo = "Mi cuarto Post";
        $post->url = str_slug("Mi cuarto Post");
        $post->resumen = "Resumen de Mi cuarto Post";
        $post->contenido = "Cotenido de Mi cuarto Post";
        $post->publicado_en = Carbon::now()->subDays(2);
        $post->category_id = 2;
        $post->save();

        $post = new Post;
        $post->titulo = "Mi quinto Post";
        $post->url = str_slug("Mi quinto Post");
        $post->resumen = "Resumen de Mi quinto Post";
        $post->contenido = "Cotenido de Mi quinto Post";
        $post->publicado_en = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->save();
    }
}
