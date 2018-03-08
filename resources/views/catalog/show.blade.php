@extends('layouts.master')

@section('content')

	<div class="row">
		<div class="col-sm-4">
			<img src="{{$pelicula['poster']}}" style="height:400px"/>
		</div>
		<div class="col-sm-8">
			{{-- TODO: Datos de la película --}} 
			<h2 style="min-height:45px;margin:5px 0 10px 0"><strong>
				{{$pelicula->title}}
			</strong></h2>
			<h4>
				Año: {{$pelicula->year}}
			</h4>
			<h4>
				Director: {{$pelicula->director}}
			</h4>
			<t>
				<br><strong>Resumen: </strong> {{$pelicula->synopsis}} 
			</t>

			<t>
				<br><br><strong>Estado: </strong>
				@if( $pelicula->rented == true)
					Película actualmente alquilada
				@else
					Película disponible
				@endif
			<br></t>
			<div class="row">
				@if( $pelicula->rented == true)
					<a class="btn btn-danger" href="#" role="button">Devolver película</a>
				@else
					<a class="btn btn-primary" href="#" role="button">Alquilar película</a>
				@endif
					<a class="btn btn-warning" href={{url('/catalog/edit/' . $pelicula->id )}} role="button">Editar película
					</a>
					<a class="btn btn-default" href={{ action('CatalogController@getIndex') }} role="button">Volver al listado
					</a>
			</div>
		</div>
	</div>
	
@stop
