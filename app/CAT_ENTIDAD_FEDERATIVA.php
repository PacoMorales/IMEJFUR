<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_ENTIDAD_FEDERATIVA extends Model
{
    protected $table = "CAT_ENTIDAD_FEDERATIVA";
    protected  $primaryKey = 'CVE_ENTIDAD_FEDERATIVA';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_ENTIDAD_FEDERATIVA', 
	    'ENTIDAD_FEDERATIVA',
	    'ABREVIACION_ENTIDAD'
    ];
}
