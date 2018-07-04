@extends('admin.layout')

@section('header')

 <h1>
        Todos los Posts
        <small>Listado de Publicaciones</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>
@stop


@section('content')

<div class="box-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Título</th>
                  <th>Resumen</th>
                  <th>Acciones</th>
                </tr>
                </thead>
      				<tbody>
      			@foreach($posts as $post)
      			<tr>
      				<td> {{ $post->id}}</td>
      				<td> {{ $post->titulo}}</td>
      				<td> {{ $post->resumen}}</td>
      				<td>
      					<a href="#" class="btn btn-success"><i class="fa fa-eye"></i></a>
      					<a href="#" class="btn btn-info"><i class="fa fa-pencil"></i></a>
      					<a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a>
      				</td>
      			</tr>
      			@endforeach

      				</tbody>
              </table>
            </div>

@stop