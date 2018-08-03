<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_DEPENDIENTES_ECONOM extends Model
{
    protected $table = "CAT_DEPENDIENTES_ECONOM";
    protected  $primaryKey = 'CVE_DEPEN_ECONOM';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_DEPEN_ECONOM', 
	    'DESC_DEPEN_ECONOM'
    ];
}
