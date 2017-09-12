@extends('layouts.principal')

@section('content')

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<!--<div class="navbar-header">
      		<a class="navbar-brand" href="#">WebSiteName</a>
    	</div>-->
		
		<ul class="nav navbar-nav navbar-right col-sm-2">
			<li><a href="/logout">Cerrar Sesión <span class="glyphicon glyphicon-log-out"></a></li>
		</ul>
	</nav>

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
		    <h1>{{$persona->apellidos}} {{$persona->nombre}}<small> {{$persona->matricula}}</small></h1><!--recuperar nombre del alumno en esta parte-->
		  	<hr>
			<div class="row">
		      <!-- left column -->
		    	<div class="col-md-2">
		      		<div class="text-center">
		        		<img src="/files/avatars/{{Auth::user()->avatar}}" class="avatar img-responsive img-circle" alt="avatar">
		          		{!! Form::open(['route' => 'profile.store', 'method' => 'POST', 'files' => 'true']) !!}
		          		{!! Form::hidden('action', 1) !!} 
		          			<div class="form-group">
		          				{!! Form::label('avatar', 'Cambiar avatar', ['class' => 'control-label sr-only']) !!}
		          				{!! Form::file('avatar',['class' => 'form-control btn-xs btn-default']) !!}
		          			</div>
		          			{!! Form::submit('Cambiar avatar',['class' => 'btn-xs btn-default']) !!}
		          		{!! Form::close() !!}
		        	</div>
		      	</div>
		      
		      	<!-- right column -->
		      	<div class="col-md-10">
		      	@include('alerts.errors')
		      	@include('alerts.request')
		      		<div class="panel panel-default">
		        	    	<div class="panel-heading">
		        	      		<h4 class="panel-title">
			        	          	Datos Personales
		        	      		</h4>
		        	    	</div>
			        	    <div class="panel-body ">
			        	    	<table class="table table-bordered">
			        	    	    <tbody>
			        	    	    	<tr>
			        	    	        	<td class="col-md-3">Nombre </td>
			        	    	        	<td class="info">{{$persona->nombre}}</td>
			        	    	      	</tr>
			        	    	      	<tr>
			        	    	        	<td class="col-md-3">Apellido </td>
			        	    	        	<td class="info">{{$persona->apellidos}}</td>
			        	    	      	</tr>
			        	    	      	<tr>
			        	    	        	<td class="col-md-3">Matrícula </td>
			        	    	        	<td class="info">{{$persona->matricula}}</td>
			        	    	      	</tr>
			        	    	      	<tr>
			        	    	        	<td class="col-md-3">Programa Académico </td>
			        	    	        	<td class="info">{{$persona->carrera}}</td>
			        	    	      	</tr>
			        	    	      	<tr>
			        	    	        	<td class="col-md-3">Cuatrimestre </td>
			        	    	        	<td class="info">{{$persona->cuatrimestre}}</td>
			        	    	      	</tr>
			        	    	    </tbody>
			        	    	  </table>
			        	    </div>
		        	  	</div>
		        
		        	<div class="panel-group" id="accordion">
		        	 	
		        	 	<div class="panel panel-default">
		        	    	<div class="panel-heading">
		        	      		<h4 class="panel-title">
			        	        	<a class="accordion-toggle" data-toggle="collapse" href="#collapseOne">
			        	          		Materias
			        	        	</a>
		        	      		</h4>
		        	    	</div>
			        	    <div id="collapseOne" class="panel-collapse collapse">
				        	    <div class="panel-body">

				        	    	<div class="container" id="matAlumno">
				        	    		<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalAlumno">Unirse a una materia</button>

				        	    		<!-- Modal -->
				        	    		<div class="modal fade" id="modalAlumno" role="dialog">
				        	    		  	<div class="modal-dialog">
				        	    		  
				        	    		    	<!-- Modal content-->
					        	    		    <div class="modal-content">
					        	    		      	<div class="modal-header">
					        	    		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        	    		        	<h4 class="modal-title">Unirse a una materia</h4>
					        	    		      	</div>
					        	    		      	<div class="modal-body">
					        	    		        	<form class="form-inline" role="form">
					        	    		        		<div class="form-group">
					        	    		        			<label for="codigoMateria">Código de la materia</label>
					        	    		        			<input type="text" class="form-control" id="codigoMateria"></input>
					        	    		        		</div>
					        	    		        		<button type="submit" class="btn btn-default">Unirse</button>
					        	    		        	</form>
					        	    		      	</div>
					        	    		      	<div class="modal-footer">
					        	    		        	<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					        	    		      	</div>
					        	    		    </div>
				        	    		    
				        	    		  	</div>
				        	    		</div>
				        	    	</div>

				        	    	<hr>

				        	    	<div class="container">
										<h2>Mis materias</h2>
										<div class="list-group">
											<div class="list-group-item col-md-9">
												<h4 class="list-group-item-heading">Nombre de la materia</h4>
												<a href="" class="list-group-item-text">Actividad - Corte - <span class="glyphicon glyphicon-download"></a>
											</div>
										</div>
									</div>
				        	    </div>
			        	    </div>
		        	  	</div>

		        	  	<div class="panel panel-default">
			        	    <div class="panel-heading">
			        	      	<h4 class="panel-title">
			        	        	<a class="accordion-toggle" data-toggle="collapse" href="#collapseTwo">
			        	          		Listas de calificaciones
			        	        	</a>
			        	      	</h4>
			        	    </div>
			        	    <div id="collapseTwo" class="panel-collapse collapse">
			        	      	<div class="panel-body">
			        	      		<div class="btn-group btn-group-justified">
			        	      			<a href="" class="btn btn-primary btn-md">Primer corte</a>
			        	      			<a href="" class="btn btn-primary btn-md">Segundo corte</a>
			        	      			<a href="" class="btn btn-primary btn-md">Tercer corte</a>
			        	      		</div>
			        	      	</div>
			        	    </div>
		        	  	</div>
		        	</div>

		      	</div>
		  	</div>
			</div>
			
		</div>
	</div>

@stop


@section('scripts')
	
	{!!Html::script('js/notify.js')!!}
	
	@if(Session::has('message-success'))

	<script>
		$.notify("Materia creada correctamente", {
		className: 'success',
		globalPosition: 'bottom left',
		showAnimation: 'slideDown',
		});
	</script>
	@endif

@stop