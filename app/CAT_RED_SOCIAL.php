<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_RED_SOCIAL extends Model
{
    protected $table = "CAT_RED_SOCIAL";
    protected  $primaryKey = 'CVE_RED_SOCIAL';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_RED_SOCIAL', 
	    'RED_SOCIAL'
    ];
}
