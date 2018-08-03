<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/fuerza-joven/info-personal/{id}/localidades','FURWEB_METADATO_299_Controller@LocalidadMunicipio');
Route::get('/fuerza-joven/info-personal/{id}/secciones','FURWEB_METADATO_299_Controller@SeccionLocalidad');
