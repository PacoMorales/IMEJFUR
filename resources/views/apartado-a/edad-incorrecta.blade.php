@extends('main')

@section('title','Edad incorrecta!')

@section('header')
@endsection

@section('content')

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header justify-content-center">{{ '  PROGRAMA SOCIAL  |  FUERZA JOVEN' }}</div>
						<div class="card-body">
							<form method="POST" action="" aria-label="{{ __('Register') }}">
	                        @csrf
								<!--<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-5">
											<a href="" class="btn btn-info">Iniciar Sesión</a>
									</div>
								</div>

								<br>-->

								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4">
										<p> Tu edad debe estar entre los 12 y los 29 años.  No es posible dar de alta.</p>
									</div>
									<div class="col-md-6 offset-md-5">
										<a href="{{ route('usuario.create') }}" class="btn btn-success">Vuelve a intentarlo!</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection