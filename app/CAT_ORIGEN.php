<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_ORIGEN extends Model
{
    protected $table = "CAT_ORIGEN";
    protected  $primaryKey = 'CVE_ORIGEN';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_ORIGEN', 
	    'DESC_ORIGEN'
    ];
}
