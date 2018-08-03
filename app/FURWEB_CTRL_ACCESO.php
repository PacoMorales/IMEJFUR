<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ConexionOracle\Conexion;

class FURWEB_CTRL_ACCESO extends Model
{
    protected $table = 'FURWEB_CTRL_ACCESO_299';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA', 
	    'FOLIO',
	    'CVE_DEPENDENCIA',
	    'LOGIN',
	    'PASSWORD',
	    'TIPO_USUARIO',
      'STATUS_1',
      'STATUS_2',
	    'FECHA_REGISTRO'
    ];

    public function scopeSearch($query, $folio){
      return $query->where('FOLIO',$folio);
    }
}
