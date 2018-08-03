<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_LENGUAS extends Model
{
    protected $table = "CAT_LENGUAS";
    protected  $primaryKey = 'CVE_LENGUA';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_LENGUA', 
	    'DESC_LENGUA'
    ];
}
