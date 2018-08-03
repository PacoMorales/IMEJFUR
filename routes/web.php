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
		Route::get('info-personal/{id}/localidades','FURWEB_METADATO_299_Controller@LocalidadMunicipio');
		Route::get('info-personal/{id}/secciones','FURWEB_METADATO_299_Controller@SeccionLocalidad');
		Route::get('usuario/administrador','FURWEB_CTRL_ACCESO_Controller@adminDelete')->name('usuario.administrador');
	});

	//Auth::routes();

	//Route::get('/home', 'HomeController@index')->name('home');
