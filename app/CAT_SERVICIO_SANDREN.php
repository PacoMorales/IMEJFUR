<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_SERVICIO_SANDREN extends Model
{
    protected $table = "CAT_SERVICIO_SANDREN";
    protected  $primaryKey = 'CVE_SERVICIO_SANDREN';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_SERVICIO_SANDREN', 
	    'DESC_SERVICIO_SANDREN'
    ];
}
