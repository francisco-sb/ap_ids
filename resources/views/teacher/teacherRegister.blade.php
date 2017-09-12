@extends('layouts.principal')



@section('content')

			<div class="container">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
			        	          	Registro de un Profesor
		        	      		</h4>
						</div>

						<div class="panel-body">
						@include('alerts.errors')
						@include('alerts.request')

							{!!Form::open(['route' => 'register.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
								{!! Form::hidden('tipoRegistro', 1) !!} 
								<div class="form-group">
									{!! Form::label('matricula', 'Matrícula', ['class' => 'control-label col-sm-4']) !!}
									<div class="col-sm-8">
									{!! Form::text('matricula', null, ['class' => 'form-control col-sm-8','placeholder' => 'Ingresa tu matrícula']) !!}
									</div>		
								</div>

								<div class="form-group">
									{!! Form::label('nombre', 'Nombre', ['class' => 'control-label col-sm-4']) !!}
									<div class="col-sm-8">
									{!! Form::text('nombre', null, ['class' => 'form-control col-sm-8','placeholder' => 'Ingresa tu nombre']) !!}
									</div>		
								</div>

								<div class="form-group">
									{!! Form::label('apellidos', 'Apellidos', ['class' => 'control-label col-sm-4']) !!}
									<div class="col-sm-8">
									{!! Form::text('apellidos', null, ['class' => 'form-control col-sm-8','placeholder' => 'Ingresa tus apellidos']) !!}
									</div>		
								</div>	

								<div class="form-group">
									{!! Form::label('password', 'Contraseña', ['class' => 'control-label col-sm-4']) !!}
									<div class="col-sm-8">
									{!! Form::password('password', ['class' => 'form-control col-sm-8','placeholder' => 'Ingresa tu contraseña']) !!}
									</div>		
								</div>					

			            		<div class="form-group">
			            			<div class="col-sm-offset-4 col-sm-8">
			            			{!! Form::submit('Registrarse',['class' => 'btn btn-default']) !!}
			            			</div>
			            		</div>

							{!! Form::close() !!}
						</div>
					</div>
			</div>

@stop


