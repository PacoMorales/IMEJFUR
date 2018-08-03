<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_CASADONDEVIVE_ES extends Model
{
    protected $table = "CAT_CASADONDEVIVE_ES";
    protected  $primaryKey = 'CVE_CASADONDEVIVE_ES';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_CASADONDEVIVE_ES', 
	    'DESC_CASADONDEVIVE_ES'
    ];
}
