@extends('plantillas.pl-principal')

@section('meta-title', $post->titulo)
@section('meta-description', $post->resumen)

@section('content')

  <article class="post container">
                                            {{--  Imagen --}}
  @if($post->photos->count() === 1)

    <figure><img src="{{ $post->photos->first()->url }}" alt="" class="img-responsive"></figure>
  
                                             {{--  Galería --}}
  @elseif($post->photos->count() > 1)
    <div class="gallery-photos masonry">
                    @foreach($post->photos as $photo)
                        <figure class="gallery-image"><img src="{{ url($photo->url) }}" alt=""></figure>
                    @endforeach
    </div>
  @endif

    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{$post->publicado_en->format('M d')}}</span>
        </div>
        <div class="post-category">
          <span class="category">{{$post->category->nombre}}</span>
        </div>
      </header>
      <h1>{{$post->titulo}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
         {!! $post->contenido !!}
        </div>

        <footer class="container-flex space-between">
          <div class="buttons-social-media-share">
            <ul class="share-buttons">
              <li><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank"><img alt="Share on Facebook" src="/img/flat_web_icon_set/Facebook.png"></a></li>
              <li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"><img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png"></a></li>
              <li><a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+"><img alt="Share on Google+" src="/img/flat_web_icon_set/Google.png"></a></li>
              <li><a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it"><img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png"></a></li>
            </ul>
          </div>
          <div class="tags container-flex">
                 @foreach($post->tags as $tag)
                        <span class="tag c-gris">#{{$tag->nombre}}</span>
                 @endforeach
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>

	@include('partials.disqus')                                
      </div><!-- .comments -->
    </div>
  </article>

<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>

@endsection
