@extends('layouts.principal')

@section('content')
			<div class="container">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
			        	          	Registro de un Alumno
		        	      		</h4>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form" action="" method="POST">
	              		
			              		<div class="form-group">
			                
			                		<label class="control-label col-sm-4" for="nombre">Nombre</label>
			                		<div class="col-sm-8">
			                			<input type="text" class="form-control" id="nombre" placeholder="Nombre">
			                		</div>
			                	</div>	

			                	<div class="form-group">
			                		<label class="control-label col-sm-4" for="apellidos">Apellidos</label>
			                		<div class="col-sm-8">
			                			<input type="text" class="form-control" id="apellidos" placeholder="Apellidos">	
			                		</div>
			        		    </div>

			                	<div class="form-group">
			                		<label class="control-label col-sm-4" for="password">Contraseña</label>
		                			<div class="col-sm-8">
		                				<input type="password" class="form-control" id="password" placeholder="Contraseña">	
		                			</div>
			                	</div>

			                	<div class="form-group">	
			                		<label class="control-label col-sm-4" for="password2">Contraseña</label>
			                		<div class="col-sm-8">
			                			<input type="password" class="form-control" id="password2" placeholder="Repite tu contraseña">	
			                		</div>
					            </div>

					            <div class="form-group">    
					                <label class="control-label col-sm-4" for="matricula">Matricula</label>
					                <div class="col-sm-8">
					                	<input type="text" class="form-control" id="matricula" placeholder="Matrícula">	
					                </div>
					            </div>

					            <div class="form-group">
					                <label class="control-label col-sm-4" for="cuatrimestre">Cuatrimestre</label>
					                <div class="col-sm-8">
					                	<input type="number" class="form-control" id="cuatrimestre" min="1" max="15" placeholder="Cuatrimestre" />
					                </div>
					            </div>

					            <div class="form-group"> 
					                <label class="control-label col-sm-4" for="carrera">Carrera</label>
					                <div class="col-sm-8">
					                	<select class="form-control" id="carrera">
					                	    <option id="carrera" value="Ing. en Desarrollo de Software">
					                	    	Ing. En Desarrollo de Software
					                	    </option>
					                	</select>
					                </div>
					            </div>                                      
								
								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-8">
										<button type="submit" class="btn btn-default">Registrarse</button>		
									</div>
								</div>				                                                                                         
			              		
			            	</form>
						</div>
					</div>
			</div>
@stop

