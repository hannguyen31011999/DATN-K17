<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //

    protected $table = "district";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
        'id',
        'province_id',
        'name',
    	'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function Villages()
    {
        return $this->hasMany('App\Model\Village','district_id','id');
    }

    public function Provinces()
    {
        return $this->belongsTo('App\Model\District','province_id','id');
    }
}
