@extends('layouts.principal')

@section('content')
	<?php
		$usuario = Auth::user()->tiporegistro;
	?>
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
		        		<img src="{{!! Auth::user()->picture !!}}" class="avatar img-responsive img-circle" alt="avatar">
		          		<h6>Cambiar foto</h6>
		          
		          		<input type="file" class="form-control btn-default btn-xs">
		        	</div>
		      	</div>
		      
		      	<!-- right column -->
		      	<div class="col-md-10">
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
				        	    	

				        	    		@include('teacher.teacherProfile')
				        	    		@section('uno')

				        	    	<table class="table table-bordered">
				        	    	    <thead>
				        	    	      	<tr class="active">
				        	    	        	<th class="col-md-3 text-center" rowspan="2">Materia</th>
				        	    	        	<th class="col-md-9 text-center" colspan="3">Actividades</th>
				        	    	      	</tr>
				        	    	      	<tr class="success">
				        	    	      		<th class="col-md-3 text-center">Corte 1</th>
				        	    	      		<th class="col-md-3 text-center">Corte 2</th>
				        	    	      		<th class="col-md-3 text-center">Corte 3</th>
				        	    	      	</tr>
				        	    	    </thead>
				        	    	    
				        	    	    <tbody>
				        	    	      	<tr class="info">
				        	    	        	<td>Tecnologías de la Información y Comunicación</td>
				        	    	        	<td>
				        	    	        		Actividad 1<br>
				        	    	        		<a class="btn btn-primary btn-xs" href="">Recurso</a>
				        	    	        	</td>
				        	    	        	<td>
				        	    	        		Actividad 2<br>
				        	    	        		<a class="btn btn-primary btn-xs" href="">Recurso</a>
				        	    	        	</td>
				        	    	        	<td>
				        	    	        		Proyecto Final<br>
				        	    	        		<a class="btn btn-primary btn-xs" href="">Recurso</a>
				        	    	        	</td>
				        	    	      	</tr>
				        	    	    </tbody>
				        	    	  </table>
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

				        	@include('teacher.teacherProfile')
				        	@section('dos')
		        	</div>

		      	</div>
		  	</div>
			</div>
			
		</div>
	</div>

@stop