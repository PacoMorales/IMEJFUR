@extends('main')

@section('title','Crea tu cuenta')

@section('header')
@endsection

@section('content')

	{!! Form::open(['route' => 'usuario.store', 'method' => 'POST']) !!}
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header text-md-center" style="color:purple;">{{ '  PROGRAMA SOCIAL FUERZA JOVEN' }}</div>
						<div class="card-body">
						<div class="form-group row mb-0">
							<div class="col-md-12 offset-md-0 text-md-center" style="color: brown;">
								<p>(En caso de ser MENOR DE EDAD no se requiere llenar campos de INE.)</p>
							</div>
						</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('FOLIO','* Folio de la tarjeta') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<input type="text" class="form-control" name="FOLIO" value="{{ old('FOLIO') }}" placeholder="FOLIO" required maxlength="6">
									
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('LOGIN','* Ingresa correo electrónico') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::email('LOGIN',null,['class' => 'form-control','placeholder' => 'CORREO ELECTRÓNICO' ,'required']) !!}
								</div>
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('PASSWORD','* Ingresa una contraseña') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::password('PASSWORD',['class' => 'form-control','placeholder' => 'CONTRASEÑA','required','maxlength' => '30']) !!}
								</div>
							</div>

							@if(count($errors) > 0)
								<div class="alert alert-danger" role="alert">
									<ul>
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-5">
									{!! Form::submit('Crear cuenta!',['class' => 'btn btn-success']) !!}
								</div>
							</div>
							<br>
							<div class="form-group row">
                            	<div class="col-md-12 offset-md-0">
                                	<div class="form-check">
                                    	<label class="form-check-label" for="siguenos">
                                        	Al registrarte estás participando en la rifa de premios para tí. Consulta nuestras redes sociales.
                                    	</label>
                                    	<div class="col-md-0 offset-md-4">
                                    		<button class="btn btn-info" onclick="window.open('https://twitter.com/imej_?lang=es');"><i class="fa fa-twitter"></i> @IMEJ_</button>
                                    		<button class="btn btn-primary" onclick="window.open('https://www.facebook.com/imej.edomex/');"><i class="fa fa-facebook"></i> imej.edomex</button>
                                    	</div>
                                	</div>
                            	</div>
                        	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
	<div class="text-md-center">
		<a class="btn btn-link"  onclick="window.open('http://imej.edomex.gob.mx/acerca-de/aviso-privacidad');"><i class="fa fa-info-circle"></i> Aviso de privacidad</a>
	</div>
@endsection