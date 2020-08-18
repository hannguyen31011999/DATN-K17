<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //


    protected $table = "province";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
    	'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function Districts()
    {
        return $this->hasMany('App\Model\District','province_id','id');
    }
}
