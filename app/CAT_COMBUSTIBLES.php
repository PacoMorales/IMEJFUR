<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_COMBUSTIBLES extends Model
{
    protected $table = "CAT_COMBUSTIBLES";
    protected  $primaryKey = 'CVE_COMBUSTIBLE';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_COMBUSTIBLE', 
	    'DESC_COMBUSTIBLE'
    ];
}
