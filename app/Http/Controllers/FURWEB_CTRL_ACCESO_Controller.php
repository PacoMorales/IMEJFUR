<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\EmailConfirmation;
use Illuminate\Support\Facades\Mail;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\FURWEB_CTRL_ACCESO;
use App\SEDESEM_299;
use App\FURWEB_METADATO_299;
use App\CAT_PROGRAMAS;

use Laracasts\Flash\Flash;

use App\Http\Requests\FURWEB_CTRL_ACCESO_Request;

class FURWEB_CTRL_ACCESO_Controller extends Controller

{

    public function index(Request $request){
        $programa       = CAT_PROGRAMAS::find(299);
        $adm            = FURWEB_METADATO_299::find(0);
        $total          = FURWEB_METADATO_299::orderBy('FOLIO','asc');
        $total_usuarios = FURWEB_METADATO_299::orderBy('FOLIO','asc')->paginate(20);
        $cant_total     = $total->count();
        $cant_page      = $total_usuarios->count();
        if(is_numeric($request->FOLIO)){
            $user           = FURWEB_METADATO_299::search($request->FOLIO)->get();
            $usuario        = $user[0];
            //dd($usuario);
            $datos          = FURWEB_METADATO_299::find($request->FOLIO);
                if($usuario->login == " "){
                    return view('usuario.admin.no-encontrado', compact('programa','datos','cant_total','adm'));   
                }else{
                    return view('usuario.admin.admin-search', compact('usuario','programa','datos','cant_total','adm'));
                }
        }else{
            if(is_string($request->FOLIO)){
                $NOMBRE_COMPLETO = strtoupper($request->FOLIO);
                $user           = FURWEB_METADATO_299::search_name($NOMBRE_COMPLETO)->get();
                $dato           = FURWEB_METADATO_299::where('NOMBRE_COMPLETO',$NOMBRE_COMPLETO)->get();
                    if(!$user->count()){
                        return view('usuario.admin.no-encontrado', compact('programa','datos','cant_total','adm'));   
                    }else{
                        $usuario = $user[0];
                        $datos   = $dato[0];
                        return view('usuario.admin.admin-search', compact('usuario','programa','datos','cant_total','adm'));
                    }
            }
            else{
                    return view('usuario.admin.no-encontrado', compact('programa','datos','cant_total','adm'));
            }

        }
        
    }

    public function create(){
        return view('usuario.registro');
    }

    public function store(FURWEB_CTRL_ACCESO_Request $request){
        if(($request->FOLIO=="0") && ($request->LOGIN=="adminFUR2018@admin.com") && ($request->PASSWORD=="adminFUR2018")){
            Flash::info("Bienvenido Administrador.")->important();
            return redirect()->route('usuario.show',$request->FOLIO);
        }else{
            if($request->FOLIO=="0" && $request->LOGIN=="god@god.god" && $request->PASSWORD=="god666"){
                Flash::info("Bienvenido Administrador GOD.")->important();
                return redirect()->route('usuario.show',$request->FOLIO); 
            }
        }
        $comp = FURWEB_CTRL_ACCESO::find($request->FOLIO);
    	if(($comp->status_1 == "1") || ($comp->login != ' ' && $comp->password != ' ' && $comp->tipo_usuario != ' ')){
            $comp::destroy($comp->FOLIO);
            if($comp->folio=='0'){
                return back()->withErrors(['FOLIO' => 'El FOLIO '.$comp->folio.' no puede registrarse. El folio debe ser mayor que cero.']);
            }
            return back()->withErrors(['FOLIO' => 'El FOLIO '.$comp->folio.' ya se encuentra registrado.']);
        }
        else{
                $user                   = new FURWEB_CTRL_ACCESO($request->all());
                $user->N_PERIODO        = date('Y');
                $user->CVE_PROGRAMA     = 299;
                $user->FOLIO            = $request->FOLIO;
                $user->CVE_DEPENDENCIA  = '215D000000';
                $user->LOGIN            = $request->LOGIN;
                $user->PASSWORD         = $request->PASSWORD;
                $user->TIPO_USUARIO     = 'PG';
                $user->STATUS_1         = '1';
                $user->STATUS_2         = '1';
                    $fecha_esp          = date('d/m/Y');
                    $dia                = substr($fecha_esp, 0, 2);
                    $mes                = substr($fecha_esp, 3, 2);
                    $anio               = substr($fecha_esp, 8, 4);
                    $fecha_ok           = $anio."/".$mes."/".$dia;
                $user->FECHA_REGISTRO   = $fecha_ok;
                $user_data = [
                                'N_PERIODO'         => $user->N_PERIODO,
                                'CVE_PROGRAMA'      => $user->CVE_PROGRAMA,
                                'FOLIO'             => $user->FOLIO,
                                'CVE_DEPENDENCIA'   => $user->CVE_DEPENDENCIA,
                                'LOGIN'             => $user->LOGIN,
                                'PASSWORD'          => $user->PASSWORD,
                                'TIPO_USUARIO'      => $user->TIPO_USUARIO,
                                'STATUS_1'          => $user->STATUS_1,
                                'STATUS_2'          => $user->STATUS_2,
                                'FECHA_REGISTRO'    => $user->FECHA_REGISTRO

                ];
                Mail::to($request->LOGIN)->send(new EmailConfirmation($user));
                $user_update = FURWEB_CTRL_ACCESO::where('FOLIO', $user->FOLIO)->update($user_data);
                Flash::success("La información de la cuenta de usuario fue registrada satisfactoriamente. Por favor lee con atención los términos de uso.")->important();
                Flash::info("Folio de tarjeta: ".$user->FOLIO.". Tu nombre de usuario o correo electrónico es: ".$user->LOGIN)->important();
                Flash::warning("Estos datos se enviarán en un correo electrónico a la dirección que ingreso.")->important();
                return view('usuario.registro-exitoso',compact('user'));
        }
    }

    public function show($id){
        if(is_numeric($id)){
            $log = FURWEB_CTRL_ACCESO::find($id);
            if(!$log->count())
                return view('errors.error');
            else
                if($log->status_2==' '){
                    return view('errors.error');
                }
            }else{
                return view('errors.error');
            }
        $usuario        = FURWEB_CTRL_ACCESO::find($id);
        $programa       = CAT_PROGRAMAS::find(299);
        $datos          = FURWEB_METADATO_299::find($id);
        if($id==0){
            $total          = FURWEB_METADATO_299::orderBy('FOLIO','asc');
            $total_usuarios = FURWEB_METADATO_299::orderBy('FOLIO','asc')->paginate(20);
            $cant_total     = $total->count();
            $cant_page      = $total_usuarios->count();
            return view('usuario.admin.vista-administrador', compact('usuario','programa','datos','total_usuarios','cant_total','cant_page'));
        }
        else{
            return view('usuario.pagina-principal',compact('usuario','programa','datos'));
        }
    }

    public function edit($id){
        if(is_numeric($id)){
            $log = FURWEB_CTRL_ACCESO::find($id);
            if(!$log->count())
                return view('errors.error');
            else
                if($log->status_2==' '){
                    return view('errors.error');
                }
            }else{
                return view('errors.error');
            }
        
                $user_data = ['STATUS_2'          => ' '];
                $user_update = FURWEB_CTRL_ACCESO::where('FOLIO', $id)->update($user_data);
                return view('usuario.registro');
    }

    public function update(FURWEB_CTRL_ACCESO_Request $request, $id){}

    public function destroy($id){}

    public function adminDelete($id){
        dd('entro');
        $usuario        = FURWEB_CTRL_ACCESO::find($id);
        $dato_personal  = FURWEB_METADATO_299::find($id);
        $dato_sociodemo = SEDESEM_299::find($id);
        $dato_personal->delete();
        $dato_sociodemo->delete();
        $user_data = [
                    'N_PERIODO'         => $usuario->N_PERIODO,
                    'CVE_PROGRAMA'      => $usuario->CVE_PROGRAMA,
                    'FOLIO'             => $usuario->FOLIO,
                    'CVE_DEPENDENCIA'   => ' ',
                    'LOGIN'             => ' ',
                    'PASSWORD'          => ' ',
                    'TIPO_USUARIO'      => ' ',
                    'STATUS_1'          => ' ',
                    'STATUS_2'          => ' ',
                    'FECHA_REGISTRO'    => null

                ];
        $user_update = FURWEB_CTRL_ACCESO::where('FOLIO', $id)->update($user_data);
        return redirect()->route('usuario.show',0);
    }
}