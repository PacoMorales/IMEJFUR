<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_SALARIOS extends Model
{
    protected $table = "CAT_SALARIOS";
    protected  $primaryKey = 'CVE_SALARIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_SALARIO', 
	    'DESC_SALARIO'
    ];
}
