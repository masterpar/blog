@extends('admin.layout')

@section('header')

  <h1>
        Todos los Posts <small>Listado de Publicaciones</small>
  </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>

@stop


@section('content')
 <div class="box box-primary">
      <div class="box-header">
          <h2 class="box-title">Publicaciones</h2>
         <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Crear Publicación  <i class="fa fa-plus"></i> </button>
      </div>
  </div>

<div class="box-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Título</th>
                  <th>Resumen</th>
                  <th>No. Fotos</th>
                  <th>Acciones</th>
                </tr>
                </thead>
      				<tbody>
      			@foreach($posts as $post)
      			<tr>
      				<td> {{ $post->id}}</td>
      				<td> {{ $post->titulo}}</td>
      				<td> {{ $post->resumen}}</td>
              <td> {{ $post->photos()->count()}}</td>
      				<td>
      					<a target="_blank" href="/blog/{{$post->url}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
      					<a href="{{ route('admin.posts.edit',$post) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
      					<a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a>
      				</td>
      			</tr>
      			@endforeach

      				</tbody>
              </table>
            </div>

                                            {{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action=" {{ route('admin.posts.store') }}">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group {{ $errors->has('titulo') ?  'has-error' : '' }}">
          <label>Titulo de la Publicación</label>
            <input value=" {{old('titulo') }}" name="titulo" class="form-control" placeholder="Ingresa aquí el título de la publicación"></input>
            {!! $errors->first('titulo','<span class="help-block">:message</span>')!!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  class="btn btn-primary">Crear publicación</button>
      </div>
    </div>
  </div>
</form>
</div>

@stop