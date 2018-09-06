<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FURWEB_CTRL_ACCESO;
use App\SEDESEM_299;
use App\FURWEB_METADATO_299;

class JOVENES_MOVIMIENTO_Controller extends Controller
{
    public function altaBeneficiario(){
    	return view('jovenes-movimiento.login');
    }

   	public function capturaBeneficiario(Request $request){
   		dd($request->all());	
   	}
}
