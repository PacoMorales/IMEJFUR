<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_MUNICIPIOS_SEDESEM extends Model
{
    protected $table = "CAT_MUNICIPIOS_SEDESEM";
    protected  $primaryKey = 'MUNICIPIOID';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'ENTIDADFEDERATIVAID', 
	    'MUNICIPIOID',
	    'MUNICIPIONOMBRE'
    ];
}
