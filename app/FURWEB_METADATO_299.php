<?php 
/*
Clase modelo: FURWEB_METADATO_299
Descripción: esta clase se creó para poder utilizar los datos de esta tabla.
Función scopeSearch_name() : Las funciones scope se utilizan para realizan querys especificos; en este caso
                            se realiza la busqueda del registro con un nombre en especifico, y el resultado
                            se regresa en la variable query.

Función scopeSearch() : Las funciones scope se utilizan para realizan querys especificos; en este caso
                        se realiza la busqueda del registro con un folio en especifico, y el resultado
                        se regresa en la variable query.

Función ValidaEdad() : A partir de la fecha de nacimiento dada por el usuario, se obtine el año de nacimiento,
                        este año es sometido a una operación matemática (AÑO_ACTUAL - AÑO_NACIMIENTO) y el 
                        resultado, son los años que tiene.

Función ValidaDuplicados() : Esta función verifica que no existan registros duplicados en la base de satos,
                             por medio del nombre completo, fecha de nacimiento y el municipio donde vive.

Función ValidaCURP() : Esta función verifica que sea correcta la curp ingresada respecto a tu fecha de nacimiento, 
                        sexo y entidad de nacimiento.

Función ValidaRFC() : Esta función verifica que sea correcta la rfc ingresada respecto a tu fecha de nacimiento.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;
use Propaganistas\LaravelFakeId\RoutesWithFakeIds;

use App\CAT_ENTIDAD_FEDERATIVA;
use App\LU_LOCALIDADES_SEDESEM;
use App\CAT_MUNICIPIOS_SEDESEM;

class FURWEB_METADATO_299 extends Model
{
    use RoutesWithFakeIds;
    
    protected $table = "FURWEB_METADATO_299";
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
    	'N_PERIODO',
    	'CVE_PROGRAMA',
    	'FOLIO',
    	'FOLIO_RELACIONADO', //CUAL ES SU FUNCION ?
        'CVE_DEPENDENCIA',
    	'CVE_COORDINACION',
    	'TIPO_BENEFICIARIO', //DEFAULT B
    	'PRIMER_APELLIDO',
    	'SEGUNDO_APELLIDO',
    	'NOMBRES',
    	'NOMBRE_COMPLETO', //CONCATENAR PRIMER_PATERNO + SEGUNDO_APELLIDO + NOMBRES
    	'FECHA_NACIMIENTO',
    	'NUMERO_HIJOS',
    	'SEXO',
    	'TP_ID_OFICIAL',
    	'FOLIO_ID_OFICIAL',
    	'CVE_ESTADO_CIVIL',
    	'CVE_GRADO_ESTUDIOS',	// DUDA 
    	'CVE_PARENTESCO',		// DUDA
    	'CURP',
    	'RFC',
    	'CVE_NACIONALIDAD',
    	'CVE_LUGAR_NACIMIENTO',
    	'CVE_ACTIVIDAD_LABORAL',
    	'CALLE',
    	'NUM_EXT',
    	'NUM_INT',
    	'MANZANA',
    	'LOTE',
    	'CODIGO_POSTAL',
    	'SECCION',
    	'ENTRE_CALLE',
    	'Y_CALLE',
    	'OTRA_REFERENCIA',
    	'LADA_TELEFONO',
    	'TELEFONO',
    	'COLONIA',
    	'CVE_LOCALIDAD',
    	'LOCALIDAD',
    	'CVE_MUNICIPIO',
    	'CVE_ENTIDAD_FEDERATIVA,',
    	'CVE_REGION',
    	'CORREO_ELECTRONICO',
        'CVE_RED_SOCIAL',
    	'RED_SOCIAL',
        'STATUS_1',
        'STATUS_2',
    	'USU',
    	'PW',
    	'IP',
    	'FECHA_REG'
    ];

    public function scopeSearch_name($query, $nombre_completo){
      return $query->where('NOMBRE_COMPLETO',$nombre_completo);
    }

    public function scopeSearch($query, $folio){
      return $query->where('FOLIO',$folio);
    }

    public static function ValidaEdad($fecha)
    {
        //$fecha = $this->FECHA_NACIMIENTO;
        $fecha_esp = str_replace("/", "", $fecha);
        $anio     = (int)substr($fecha_esp, 4, 4);
        $anio_act = (int)date('Y');
        $edad = $anio_act - $anio;
        //dd('ValidaEdad con '.$edad);
        if ($edad < 12 || $edad > 29){
            //dd('regresa false');
            return false;
        }
        else{
            //dd('regresa true');
            return true;
        }
        
    }

    public static function ValidaDuplicados($nombre_aux,$fecha_aux,$municipio_aux){
        $nombre     = strtoupper($nombre_aux);
        $fecha      = strtoupper($fecha_aux);
        $municipio  = strtoupper($municipio_aux);
            //dd($fecha);
            $fecha_esp  = str_replace("/", "", $fecha);
            $dia        = substr($fecha_esp, 0, 2);
            $mes        = substr($fecha_esp, 2, 2);
            $anio       = substr($fecha_esp, 4, 4);
            //$fecha_ok   = $anio."/".$mes."/".$dia;
            $fecha_ok   = $anio.'-'.$mes.'-'.$dia.' 00:00:00';
            //dd($fecha_ok);
            //dd('ValidaDuplicados con '.$nombre.'-'.$fecha_ok.'-'.$municipio);
            //$prueba = FURWEB_METADATO_299::find(300001);
            //dd($prueba);
        $dup = FURWEB_METADATO_299::where([
                                                'NOMBRE_COMPLETO' => $nombre,
                                                'FECHA_NACIMIENTO' => $fecha_ok,
                                                'CVE_MUNICIPIO' => $municipio
                                            ])->get();
        //dd($dup);
        //dd('ValidaDuplicados');
        if(!$dup->count()){
            //dd('if($dup = NULL)');
            return true;
        }
        else{
            //dd('if($dup != NULL)');
            return false;
        }
    }

    public static function ValidaDuplicadosEditar($nombre_aux,$fecha_aux,$municipio_aux){
        $nombre     = strtoupper($nombre_aux);
        $fecha      = strtoupper($fecha_aux);
        $municipio  = strtoupper($municipio_aux);
            //dd($fecha);
            $fecha_esp  = str_replace("/", "", $fecha);
            $dia        = substr($fecha_esp, 6, 2);
            $mes        = substr($fecha_esp, 4, 2);
            $anio       = substr($fecha_esp, 0, 4);
            //$fecha_ok   = $anio."/".$mes."/".$dia;
            $fecha_ok   = $anio.'-'.$mes.'-'.$dia.' 00:00:00';
            //dd($fecha_ok);
            //dd('ValidaDuplicados con '.$nombre.'-'.$fecha_ok.'-'.$municipio);
            //$prueba = FURWEB_METADATO_299::find(300001);
            //dd($prueba);
        $dup = FURWEB_METADATO_299::where([
                                                'NOMBRE_COMPLETO' => $nombre,
                                                'FECHA_NACIMIENTO' => $fecha_ok,
                                                'CVE_MUNICIPIO' => $municipio
                                            ])->get();
        //dd($dup);
        //dd('ValidaDuplicados');
        if(!$dup->count()){
            //dd('if($dup = NULL)');
            return true;
        }
        else{
            //dd('if($dup != NULL)');
            return false;
        }
    }

    public static function ValidaCurp($fecha_aux,$curp_aux,$sexo_aux,$cve_ef){
        //dd('ValidaCurp');
        $fecha  = strtoupper($fecha_aux);
        $curp   = strtoupper($curp_aux);
        $sexo   = strtoupper($sexo_aux);
        $entFed = CAT_ENTIDAD_FEDERATIVA::find($cve_ef);
        $ent    = $entFed->abreviacion_entidad;

        $fecha_esp  = str_replace("/", "", $fecha);
        $dia        = substr($fecha_esp, 0, 2);
        $mes        = substr($fecha_esp, 2, 2);
        $anio       = substr($fecha_esp, 6, 2);

        $fechaCurp  = substr($curp, 4, 6);
        $sexoCurp   = substr($curp, 10, 1);
        $entCurp    = substr($curp, 11, 2);
        
        $armada     = $anio.$mes.$dia;
        //dd('ValidaCurp con '.$curp_aux.' contra '.$armada.$sexo.$ent);
        if ($fechaCurp != $armada){
            //dd('fecha armada');
            return false;
        }else
            if ($sexo != $sexoCurp){
                //dd('sexo');
                return false;
            }else
                if ($ent != $entCurp){
                    //dd('ent = '.$ent.' contra entCurp = '.$entCurp);
                    return false;
                }else
                    return true;

    }


    public static function ValidaRFC($fecha_aux,$curp_aux,$rfc_aux){
        $fecha  = strtoupper($fecha_aux);
        $curp   = strtoupper($curp_aux);
        $rfc   = strtoupper($rfc_aux);
        
        $fecha_esp = str_replace("/", "", $fecha);
        $dia     = substr($fecha_esp, 0, 2);
        $mes     = substr($fecha_esp, 2, 2);
        $anio     = substr($fecha_esp, 6, 2);

        $fechaRfc = substr($rfc, 4, 6);
        $rfc10 = substr($rfc, 0, 10);
        $curp10 = substr($curp, 0, 10);
        $armada = $anio.$mes.$dia;
        //dd($fechaRfc.' != '.$armada.' y la otra condicion '.$rfc10.' != '.$curp10);
        if ($fechaRfc != $armada){
            return false;
        }else
            if ($rfc10 != $curp10){
                return false;
            }else
                return true;
    }

    public static function validaNombres($nombre){
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
           for ($i=0; $i<strlen($nombre); $i++){
              if (strpos($permitidos, substr($nombre,$i,1))===false){
                 return false;
              }
           }
           return true;
    }

    public static function validaNumero($numero){
        $permitidos = "1234567890";
           for ($i=0; $i<strlen($numero); $i++){
              if (strpos($permitidos, substr($numero,$i,1))===false){
                 return false;
              }
           }
           return true;
    }
}
