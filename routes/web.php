<?php

	//Route::model('FURWEB_METADATO_299', 'FURWEB_METADATO_299');
    //Route::model('SEDESEM_299', 'App\SEDESEM_299');

	Route::get('/', function () {
	    return view('usuario.inicio');
	});

	Route::group(['prefix' => 'fuerza-joven'], function(){
		Route::resource('info-personal','FURWEB_METADATO_299_Controller'); 
		Route::resource('info-sociodemo','SEDESEM_299_Controller');
		Route::resource('usuario','FURWEB_CTRL_ACCESO_Controller');
		Route::get('registro-exitoso','FURWEB_METADATO_299_Controller@nuevoRegistroJEM')->name('usuario.ok');
		Route::get('info-personal/{id}/localidades','FURWEB_METADATO_299_Controller@LocalidadMunicipio')->name('info-personal.localidades');
		Route::get('info-personal/{id}/secciones','FURWEB_METADATO_299_Controller@SeccionLocalidad')->name('info-personal.secciones');
		Route::get('info-personal/localidades/{id}','FURWEB_METADATO_299_Controller@LocalidadMunicipio');
		Route::get('info-personal/secciones/{id}','FURWEB_METADATO_299_Controller@SeccionLocalidad');
		Route::get('usuario/administrador/{id}/','FURWEB_CTRL_ACCESO_Controller@adminDelete')->name('usuario.administrador'); 
	});

	Route::group(['prefix' => 'jovenes-en-movimiento'], function(){
		Route::get('nuevo/crea-tu-cuenta/login','JOVENES_MOVIMIENTO_Controller@altaBeneficiario')->name('beneficiario.login');
		Route::post('nuevo/datos','JOVENES_MOVIMIENTO_Controller@capturaBeneficiario')->name('beneficiario.captura');
	});

	//Auth::routes();

	//Route::get('/home', 'HomeController@index')->name('home');
