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
		    <h1>{{$persona->apellidos}} {{$persona->nombre}} <small> {{$persona->matricula}}</small></h1><!--recuperar nombre del alumno en esta parte-->
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
				        	    	

				        	    		<div class="container" id="matProfesor">
				        	    		<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalProfesor">Crear Materia</button>

				        	    		<!-- Modal -->
				        	    		<div class="modal fade" id="modalProfesor" role="dialog">
				        	    		  	<div class="modal-dialog">
				        	    		  
				        	    		    	<!-- Modal content-->
					        	    		    <div class="modal-content">
					        	    		      	<div class="modal-header">
					        	    		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        	    		        	<h4 class="modal-title">Crear materia</h4>
					        	    		      	</div>
					        	    		      	
					        	    		      	<div class="modal-body">
					        	    		      		{!! Form::open(['route' => 'profile.store', 'method'=>'POST', 'class' => 'form-horizontal', 'role' => 'form','files' => 'true']) !!}
					        	    		      			{!! Form::hidden('action', 2) !!}
					        	    		      			{!! Form::hidden('teacher_id', $persona->matricula) !!}  
					        	    		      		   	<div class="form-group">
					        	    		      		   		{!! Form::label('nombre','Materia',['class' => 'control-label col-sm-4']) !!}
					        	    		      		     	<div class="col-sm-8">
					        	    		      		     		{!! Form::text('nombre',null,['class' => 'form-control','placeholder' => 'Nombre de la materia']) !!}
					        	    		      		     	</div>
					        	    		      		    </div> 	

					        	    		      		    <div class="form-group">
					        	    		      		    	{!! Form::label('cuatrimestre','Cuatrimestre',['class' => 'control-label col-sm-4']) !!}
					        	    		      		     	<div class="col-sm-8">
					        	    		      		     		{!! Form::number('cuatrimestre',null,['class' => 'form-control','placeholder' => 'Cuatrimestre','min' => '1','max' => '10']) !!}
					        	    		      		     	</div>
					        	    		      		    </div>

					        	    		      		    <hr>

					        	    		      		    <p class="label-info">Primero crea tu archivo de políticas</p>
					        	    		      		    <div class="form-group">
					        	    		      		    	<label class="control-label col-sm-4">Políticas</label>
					        	    		      		    	<div class="col-sm-8">

					        	    		      		   			<a href="/policies" target="_blank" class="form-control btn btn-default">Crear archivo</a> 		
					        	    		      		    	</div>	
					        	    		      		    </div>

					        	    		      		    <p class="label-info">Ahora sube tu archivo de políticas a nuestro servidor</p>
					        	    		      		    <div class="form-group">
					        	    		      		    	{!! Form::label('pathfile','Archivo',['class' => 'control-label col-sm-4']) !!}
					        	    		      		    	<div class="col-sm-8">
					        	    		      		    		{!! Form::file('pathfile',['class' => 'form-control btn-default']) !!}
					        	    		      		    	</div>	
					        	    		      		    </div>

					        	    		      		    <hr>
					        	    		      		    <p class="label-info">Asigna un código a tu materia, éste debe ser único y no podrás cambiarlo nuevamente.</p>
					        	    		      		    <div class="form-group">
					        	    		      		    	{!! Form::label('codigo','Código de clase',['class' => 'control-label col-sm-4']) !!}
					        	    		      		    	<div class="col-sm-8">
					        	    		      		   			{!! Form::text('codigo',null,['class' => 'form-control','placeholder' => 'Código de la materia']) !!} 		
					        	    		      		    	</div>	
					        	    		      		    </div>

					        	    		      		    <div class="form-group">
					        	    		      		    	<div class="col-sm-offset-4 col-sm-8">
					        	    		      		    		{!! Form::submit('Guardar Materia',['class' => 'btn btn-default']) !!}
					        	    		      		    	</div>	
					        	    		      		    </div>
					        	    		      		    {!! Form::close() !!}
					        	    		      	</div>

					        	    		      	<div class="modal-footer">
					        	    		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        	    		      	</div>
					        	    		    </div>
				        	    		    
				        	    		  	</div>
				        	    		</div>
				        	    	</div>

				        	    	<hr>
				        	    	
				        	    	<div class="container">
										<h2>Mis materias</h2>
										<div class="list-group">
										@foreach($materias as $materia)
											<div class="list-group-item col-md-9">
												<h4 class="list-group-item-heading">{{$materia->nombre}}</h4>
												<a href="" class="list-group-item-text"><p class="col-md-3">Actividad: </p><p class="col-md-3">Corte: </p><span class="glyphicon glyphicon-download"></a>
												<h4>Código de la materia: <strong>{{$materia->codigo}}</strong></h4>
											</div>
										@endforeach	
										</div>
									</div>
									
				        	    </div>
			        	    </div>
		        	  	</div>

				        	<div class="panel panel-default">
		        	    	<div class="panel-heading">
		        	      		<h4 class="panel-title">
		        	        		<a class="accordion-toggle" data-toggle="collapse" href="#collapseThree" disabled>
		        	          			Gestionar Clase
		        	        		</a>
		        	      		</h4>
		        	    	</div>
		        	    	<div id="collapseThree" class="panel-collapse collapse">
		        	      		<div class="panel-body">
		        	        		<div class="btn-group btn-group-justified">
		        	        			<div class="btn-group">
		        	        				<button type="button" class="btn btn-primary btn-md" disabled="">Gestionar Evidencias</button>
		        	        			</div>
		        	        			<div class="btn-group">
		        	        				<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalRecursos">Gestionar Recursos</button>
		        	        			</div>
			        	      		</div>

			        	      		<div class="modal fade" id="modalRecursos" role="dialog">
				        	    		  	<div class="modal-dialog">
				        	    		  
				        	    		    	<!-- Modal content-->
					        	    		    <div class="modal-content">
					        	    		      	<div class="modal-header">
					        	    		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        	    		        	<h4 class="modal-title">Gestionar Recursos</h4>
					        	    		      	</div>
					        	    		      	
					        	    		      	<div class="modal-body">

					        	    		      		{!! Form::open(['route' => 'profile.store', 'method'=>'POST', 'class' => 'form-horizontal', 'role' => 'form','files' => 'true']) !!}
					        	    		      			{!! Form::hidden('action', 3) !!}
					        	    		      		   	<div class="form-group">
					        	    		      		   		{!! Form::label('actividad','Actividad',['class' => 'control-label col-sm-4']) !!}
					        	    		      		     	<div class="col-sm-8">
					        	    		      		     		{!! Form::text('actividad',null,['class' => 'form-control','placeholder' => 'Nombre de la actividad']) !!}
					        	    		      		     	</div>
					        	    		      		    </div> 	

					        	    		      		    <div class="form-group">
					        	    		      		    	{!! Form::label('corte','Cuatrimestre',['class' => 'control-label col-sm-4']) !!}
					        	    		      		     	<div class="col-sm-8">
					        	    		      		     		{!! Form::number('corte',null,['class' => 'form-control','placeholder' => 'Corte al que pertenece','min' => '1','max' => '3']) !!}
					        	    		      		     	</div>
					        	    		      		    </div>

					        	    		      		    <hr>

					        	    		      		    <p class="label-info">Primero crea tu archivo</p>
					        	    		      		    <div class="form-group">
					        	    		      		    	<label class="control-label col-sm-4">Políticas</label>
					        	    		      		    	<div class="col-sm-8">
					        	    		      		   			<div class="btn-group btn-group-justified">
					        	    		      		   				<a href="/listacotejo" target="_blank" class="btn btn-primary btn-md">Lista de cotejo</a>
					        	    		      		   				<a href="/guiaobservacion" target="_blank" class="btn btn-primary btn-md">Guía de observación</a>
					        	    		      		   			</div>
					        	    		      		    	</div>	
					        	    		      		    </div>

					        	    		      		    <p class="label-info">Ahora sube tu archivo a nuestro servidor</p>
					        	    		      		    <div class="form-group">
					        	    		      		    	{!! Form::label('pathfile','Archivo',['class' => 'control-label col-sm-4']) !!}
					        	    		      		    	<div class="col-sm-8">
					        	    		      		    		{!! Form::file('pathfile',['class' => 'form-control btn-default']) !!}
					        	    		      		    	</div>	
					        	    		      		    </div>

					        	    		      		    <hr>
					        	    		      		    <p class="label-info">Selecciona a la materia que pertenece</p>
					        	    		      		    <div class="form-group">
					        	    		      		    	{!! Form::label('materia_id','Materia',['class' => 'control-label col-sm-4']) !!}
					        	    		      		    	<div class="col-sm-8">
					        	    		      		   			{!! Form::select('materia_id', $materiasDropdown,null,['class' => 'form-control col-sm-8']) !!}
					        	    		      		    	</div>	
					        	    		      		    </div>

					        	    		      		    <div class="form-group">
					        	    		      		    	<div class="col-sm-offset-4 col-sm-8">
					        	    		      		    		{!! Form::submit('Guardar Recurso',['class' => 'btn btn-default']) !!}
					        	    		      		    	</div>	
					        	    		      		    </div>
					        	    		      		    {!! Form::close() !!}
					        	    		      	</div>
					        	    		      	
					        	    		      	<div class="modal-footer">
					        	    		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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