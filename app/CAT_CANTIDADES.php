<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_CANTIDADES extends Model
{
    protected $table = "CAT_CANTIDADES";
    protected  $primaryKey = 'CVE_CANT';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_CANT', 
	    'DESC_CANT'
    ];
}
