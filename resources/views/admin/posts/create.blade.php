@extends('admin.layout')

@section('header')

 	 <h1> Todos los Posts <small>Listado de Publicaciones</small></h1>
	      <ol class="breadcrumb">
		      	 <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		         <li><a href="{{ route('admin.posts.index')}}"><i class="fa fa-list"></i>Posts</a></li>
		         <li class="active">Crear</li>
	       </ol>
@stop

@section('content')

<div class="row">
	<form>
		<div class="col-sm-6">
			<div class="box box-primary">
				<div class="box-body">
				<div class="form-group">
					<label>Titulo de la Publicación</label>
						<input name="title" class="form-control" placeholder="Ingresa aquí el título de la publicación"></input>
				</div>
				<div class="form-group">
					<label>Contenido de la Publicación</label>
						<textarea name="body" rows="10" class="form-control" placeholder="Ingresa el contenido de la publicación"></textarea>
				</div>
				</div>
			</div>
		</div>

	<div class="row">
	<div class="col-sm-6">		
		<div class="box box-primary">	
				  <div class="box-body">
						<div class="form-group">
								<label>Resumen de la Publicación</label>
									<textarea name="resumen" class="form-control" placeholder="Ingresa un resumen de la publicación"></textarea>
						</div>	
					</div>
		</div>		
	</div>
</div>
</form>
 </div>
</div>

@stop