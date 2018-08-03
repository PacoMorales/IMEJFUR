<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_DISCAPACIDAD extends Model
{
    protected $table = "CAT_DISCAPACIDAD";
    protected  $primaryKey = 'CVE_DISCAPACIDAD';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_DISCAPACIDAD', 
	    'DESC_DISCAPACIDAD'
    ];
}
