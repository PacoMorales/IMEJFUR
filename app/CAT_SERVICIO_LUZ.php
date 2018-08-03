<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_SERVICIO_LUZ extends Model
{
    protected $table = "CAT_SERVICIO_LUZ";
    protected  $primaryKey = 'CVE_SERVICIO_LUZ';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_SERVICIO_LUZ', 
	    'DESC_SERVICIO_LUZ'
    ];
}
