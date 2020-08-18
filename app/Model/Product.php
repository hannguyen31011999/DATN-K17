<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $table = "product";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
    	'type_product_id',
    	'product_name',
    	'description',
    	'unit_price',
    	'promotion_price',
        'qty',
    	'image',
    	'unit',
    	'raw_material',
    	'origin',
    	'created_at',
        'updated_at',
        'deleted_at'
    ];

    // ép kiểu của trường về thời gian ngày/tháng/năm
    protected $casts = [
        'created_at'=>'datetime:d/m/Y - H:i',
        'updated_at'=>'datetime:d/m/Y - H:i',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Relationship 1-n với bảng comment
    public function Comments()
    {
        return $this->hasMany('App\Model\Comment','product_id','id');
    }

    // Relationship 1-n với bảng order_detail
    public function OrderDetails()
    {
        return $this->hasMany('App\Model\OrderDetail','product_id','id');
    }
    public function TypeProducts()
    {
        return $this->belongsTo('App\Model\TypeProduct','type_product_id','id');
    }
  
}
