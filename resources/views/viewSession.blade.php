@extends('layouts.principal')

@section('content')
	@include('alerts.errors')
	@include('alerts.request')

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<!--<div class="navbar-header">
      		<a class="navbar-brand" href="#">WebSiteName</a>
    	</div>-->
		
		<ul class="nav navbar-nav navbar-right col-sm-2">
			<li><a data-toggle="modal" data-target="#modalRegistro">Registro <span class="glyphicon glyphicon-user"></a></li>
		</ul>
	</nav>

	<section class="main row">
		<div class="container">
			<div class="col-md-4 col-md-offset-4">
				{!! Form::open(['route' => 'log.store', 'method'=>'POST', 'class' => 'form-signin']) !!}
					<h2 class="form-signin-heading text-center">AP-IDS</h2>
					<div class="form-group">
						{!! Form::label('name', 'Matrícula', ['class' => 'sr-only']) !!}
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Matrícula']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Contraseña', ['class' => 'sr-only']) !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
					</div>
					{!! Form::submit('Iniciar Sesión',['class' => 'btn btn-lg btn-primary btn-block']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="modalRegistro" role="dialog">
	    <div class="modal-dialog">
	  
	     		     	<!-- Modal content-->
	     		     	<div class="modal-content">
	     		          	<div class="modal-header">
	     		            	<button type="button" class="close" data-dismiss="modal">&times;</button>
	     		            	<h4 class="modal-title">Registro</h4>
	     		          	</div>

	     			        <div class="modal-body">
	     			        	<div class="btn-group btn-group-justified">
	     			        		<a href="/register/teacher" class="btn btn-success btn-lg">Soy un profesor</a>
	     			        		<a href="/register/student" class="btn btn-success btn-lg">Soy un alumno</a>
	     			        	</div>
	     		          	</div>
	     		         
	     		          	<div class="modal-footer">
	     		            	<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
	     		          	</div>
	     		      	</div>
	    
	    </div>
	</div>

@stop

@section('scripts')
	
	{!!Html::script('js/notify.js')!!}
	
	@if(Session::has('message-success'))

	<script>
		$.notify("Usuario creado correctamente", {
		className: 'success',
		globalPosition: 'bottom left',
		showAnimation: 'slideDown',
		});
	</script>
	@endif

@stop