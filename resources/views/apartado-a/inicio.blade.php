@extends('main')

@section('title','Datos Personales')

@section('tags')
						<div class="row justify-content-end">
							<div class="mol-md-8">
								<div class="card">
									<div class="card-folio justify-content-center"><i class="fa fa-tag"></i> {{'FOLIO: '}}{!! $usuario->folio !!}</div>
								</div>
							</div>
						</div>
@endsection

@section('content')

	{!! Form::open(['route' => 'info-personal.store', 'method' => 'POST']) !!}

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header justify-content-center">{{ '  PROGRAMA SOCIAL |  '}} {!!$programa->programa!!} {{'	|	APARTADO A 	| DATOS PERSONALES' }} <i class="fa fa-user"></i></div>
						<div class="card-body">
							
							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('DEPENDENCIA','Nombre de la Dependencia') !!}
								</div>
								<div class="col-md-6 offset-md-1">
									{!! Form::label('DEP','INSTITUTO MEXIQUENSE DE LA JUVENTUD') !!}
								</div>
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('PROGRAMA','Programa Gubernamental') !!}
								</div>
								<div class="col-md-6 offset-md-1">
									{!! $programa->programa !!}
								</div>
							</div>
<!--# COMPROBAR INFORMACION ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'COMPROBAR INFORMACIÓN DEL REGISTRO' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('FOLIO','Folio de Tarjeta') !!}
								</div>
								<div class="col-md-6 offset-md-1">
									<p><input type="text" name="FOLIO" value="{{$usuario->folio}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CORREO','Correo electrónico (e-mail)') !!}
								</div>
								<div class="col-md-6 offset-md-1">
									<p><input type="text" name="LOGIN" value="{{$usuario->login}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
								</div>	
							</div>
<!--# ERRORES ###############################################################################################################################################################################################################################################################################-->
							@if(count($errors) > 0)
								<div class="alert alert-danger" role="alert">
									<ul>
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

<!--# IDENTIFICACION GEOGRAFICA ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center  text-md-center">{{ 'IDENTIFICACIÓN GEOGRÁFICA' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('MUNICIPIO','* Municipio') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									<select class="form-control m-bot15" name="municipio" id="municipio" required>									
            							<option value="">SELECCIONE MUNICIPIO</option>
            							@foreach($municipios as $municipio)
            								<option value="{{ $municipio->municipioid }}">{{ $municipio->municipionombre }}</option>
            							@endforeach    
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('LOCALIDAD','* Localidad') !!}
								</div>
								<div class="col-md-4 offset-md-1">								
									<select class="form-control m-bot15" name="localidad" id="localidad" required>
            							<option value="">SELECCIONE LOCALIDAD</option>
									</select> 
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('SECCION','* Sección') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									<select class="form-control m-bot15" name="seccion" id="seccion" required>
            							<option value="">SELECCIONE SECCIÓN</option>			            			
									</select>
								</div>	
							</div>

<!--# DATOS DE LA VIVIENDA ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center  text-md-center">{{ 'DATOS DE LA VIVIENDA' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CALLE','* Calle') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('CALLE',null,['class' => 'form-control','placeholder' => 'Ej. 2 de Noviembre' ,'required']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('NUM_EXT','Número exterior') !!}
								</div>
								<div class="col-md-2 offset-md-1">
									{!! Form::text('NUM_EXT',null,['class' => 'form-control','placeholder' => 'Ej. 505']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('NUM_INT','Número interior') !!}
								</div>
								<div class="col-md-2 offset-md-1">
									{!! Form::text('NUM_INT',null,['class' => 'form-control','placeholder' => 'Ej. 3A']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ENTRE_CALLE','Entre calle') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('ENTRE_CALLE',null,['class' => 'form-control','placeholder' => 'Ej. Ignacio zaragoza']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('Y_CALLE','Y calle') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('Y_CALLE',null,['class' => 'form-control','placeholder' => 'Ej. Adolfo lópez mateos']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('OTRA_REFERENCIA','* Otra referencia') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('OTRA_REFERENCIA',null,['class' => 'form-control','placeholder' => 'Ej. En la entrada están 2 arboles','required']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('COLONIA','* Colonia') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('COLONIA',null,['class' => 'form-control','placeholder' => 'Ej. Centro Histórico' ,'required']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CODIGO_POSTAL','* Código postal') !!}
								</div>
								<div class="col-md-2 offset-md-1">
									{!! Form::text('CODIGO_POSTAL',null,['class' => 'form-control','placeholder' => 'Ej. 50101' ,'required','maxlength' => '5']) !!}
								</div>	
							</div>
<!--# DATOS PERSONALES ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center  text-md-center">{{ 'DATOS PERSONALES' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('PRIMER_APELLIDO','* Primer apellido') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('PRIMER_APELLIDO',null,['class' => 'form-control','placeholder' => 'Ej. Gonzalez' ,'required']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('SEGUNDO_APELLIDO','Segundo apellido') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('SEGUNDO_APELLIDO',null,['class' => 'form-control','placeholder' => 'Ej. Salgado']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('NOMBRES','* Nombre(s)') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('NOMBRES',null,['class' => 'form-control','placeholder' => 'Ej. Israel' ,'required']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('SEXO','* Sexo') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									<p><input type="radio" name="sexo" checked value="H" style="margin-right:5px;">Hombre
									<input type="radio" name="sexo" value="M" style="margin-right:5px;">Mujer</p>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('FECHA_NACIMIENTO','* Fecha de nacimiento') !!}
								</div>

								
			                        <!--<div class="form-group">-->
			                            
			                            <div class="col-md-2 offset-md-1">
			                                <input type="text" class="form-control datepicker" name="FECHA_NACIMIENTO" placeholder="dd/mm/aaaa" required>
			                                <div class="input-group-addon">
			                                    <span class="glyphicon glyphicon-th"></span>
			                                </div>
			                            </div>
			                        <!--</div>-->
			                        
			                    

								<!--<div class="col-md-4 offset-md-1">
									{!! Form::text('FECHA_NACIMIENTO',null,['class' => 'form-control','placeholder' => 'dd/mm/aaaa' ,'required']) !!}
								</div>-->	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_ESTADO_CIVIL','* Estado civil') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									<select class="form-control m-bot15" name="estado_civil" required>
            							<option value="">SELECCIONE ESTADO CIVIL</option>
            							@foreach($edo_civil as $ec)
            								<option value="{{ $ec->cve_estado_civil }}">{{ $ec->estado_civil }}</option>
            							@endforeach    
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CURP','* CURP') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('CURP',null,['class' => 'form-control','placeholder' => '18 dígitos' ,'required','minlength'=>"18",'maxlength'=>"18"]) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('RFC','RFC') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('RFC',null,['class' => 'form-control','placeholder' => '10 dígitos','minlength'=>"10",'maxlength'=>"10"]) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('NACIONALIDAD','* Nacionalidad') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									<select class="form-control m-bot15" name="nacionalidad" required>
            							<option value="">SELECCIONE NACIONALIDAD</option>
            							@foreach($nacionalidad as $nacion)
            								<option value="{{ $nacion->cve_nacionalidad }}">{{ $nacion->desc_nacionalidad }}</option>
            							@endforeach    
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_ID_OFICIAL','Clave de identificación oficial') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('CVE_ID_OFICIAL',null,['class' => 'form-control','placeholder' => 'Únicamente si eres mayor de edad']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('LADA_TELEFONO','* Lada') !!}
								</div>
								<div class="col-md-2 offset-md-1">
									{!! Form::text('LADA_TELEFONO',null,['class' => 'form-control','placeholder' => 'Ej. 712' ,'required','maxlength'=>"3"]) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('TELEFONO','* Teléfono') !!}
								</div>
								<div class="col-md-2 offset-md-1">
									{!! Form::text('TELEFONO',null,['class' => 'form-control','placeholder' => 'Ej. 5407320' ,'required','maxlength'=>"9"]) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_RED_SOCIAL','Red social más utilizada') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									<select class="form-control m-bot15" name="CVE_RED_SOCIAL">
            							<option value="">SELECCIONE RED SOCIAL</option>
            							@foreach($redes as $red)
            								<option value="{{ $red->cve_red_social }}">{{ $red->red_social }}</option>
            							@endforeach    
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('RED_SOCIAL','Cuenta de red social') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('RED_SOCIAL',null,['class' => 'form-control','placeholder' => 'Ej. @Israel_Salgado']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_LUGAR_NACIMIENTO','* Entidad de nacimiento') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									<select class="form-control m-bot15" name="cve_entidad_federativa" required>
            							<option value="">SELECCIONE ENTIDAD FEDERATIVA</option>
            							@foreach($entidad_fed as $ef)
            								<option value="{{ $ef->cve_entidad_federativa }}">{{ $ef->entidad_federativa }}</option>
            							@endforeach    
									</select>
								</div>	
							</div>
<!--# BOTON CONTINUAR ###############################################################################################################################################################################################################################################################################-->
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-5">
									{!! Form::submit('Continuar!',['class' => 'btn btn-primary']) !!}
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        startDate: "01/01/1989",
        endDate: "31/12/2006",
        startView: 2,
        maxViewMode: 2,
        clearBtn: true,
        language: "es",
        autoclose: true
    });
</script>

	{!! Form::close() !!}
@endsection

@section('scripts')
	<script src="/js/apartado-a/id-geo.js"></script>
@endsection