<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    //s;

    protected $table = "village";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
        'id',
        'district_id',
        'name',
        'price_shipping',
    	'created_at',
        'updated_at',
        'deleted_at'
    ];

    
}
