<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;
    protected $table = "order";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
    	'customer_id',
    	'payment',
    	'note',
    	'status',
    	'phone',
        'name',
        'email',
    	'address',
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

    //Relationship inverse giữa bảng user và order
    public function Users()
    {
        return $this->belongsTo('App\Model\User','id','customer_id');
    }

    public function OrderDetails()
    {
        return $this->hasMany('App\Model\OrderDetail','bill_id','id');
    }
}
