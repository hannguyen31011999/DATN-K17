<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    //
    use SoftDeletes;
    protected $table = "order_detail";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
    	'bill_id',
    	'product_id',
    	'qty',
    	'product_price',
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

    //Relationship inverse giữa bảng order và order_detail
    public function OrderDetails()
    {
        return $this->belongsTo('App\Model\Order','id','bill_id');
    }
    // public function Orders()
    // {
    //     return $this->hasMany('App\Model\Order','bill_id','id');
    // }
    //Relationship inverse giữa bảng product và order_detail
    public function Products()
    {
        return $this->belongsTo('App\Model\Product','product_id','id');
    }
}
