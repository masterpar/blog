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
	<form method="POST" action=" {{ route('admin.posts.store') }}">
		@csrf
		<div class="col-sm-6">
			<div class="box box-primary">
				<div class="box-body">
				<div class="form-group">
					<label>Titulo de la Publicación</label>
						<input name="titulo" class="form-control" placeholder="Ingresa aquí el título de la publicación"></input>
				</div>
				<div class="form-group">
					<label>Contenido de la Publicación</label>
						<textarea name="contenido" rows="10" class="form-control" id="editor" placeholder="Ingresa el contenido de la publicación"></textarea>
				</div>
				</div>
			</div>
		</div>

	<div class="row">
	<div class="col-sm-6">		
		<div class="box box-primary">	
				  <div class="box-body">
				  	<div class="form-group">
               			 <label>Fecha de publicación:</label>
		                   <div class="input-group date">
			                  <div class="input-group-addon">
			                    	<i class="fa fa-calendar"></i>
			                  </div>
			                  		<input name="publicado_en" type="text" class="form-control pull-right" id="datepicker">
		                   </div>
              		</div>

              		<div class="form-group">
              			<label>Categorías</label>
              			<select name="category" class="form-control">
              				<option value="">Selecciona una categoría</option>
              				@foreach($categories as $category)
              				<option value="{{ $category->id}}"> {{$category->nombre }}</option>
              				@endforeach
              			</select>
              		</div>

              		<div class="form-group">
              			<label>Etiquetas</label>
              			 <select name="tags" class="form-control select2"multiple="multiple" data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">

			              @foreach($tags as $tag)
			              <option value="{{$tag->id }}">{{$tag->nombre }}</option>
			              @endforeach
			             </select>
              		</div>

						<div class="form-group">
								<label>Resumen de la Publicación</label>
									<textarea name="resumen" class="form-control" placeholder="Ingresa un resumen de la publicación"></textarea>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Guargar Publicación</button>
						</div>	
					</div>
		</div>		
	</div>
</div>
</form>
 </div>
</div>


    @stop