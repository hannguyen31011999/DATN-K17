<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = "comment";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
    	'user_id',
    	'product_id',
    	'content',
    	'status',
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

    //Relationship inverse giữa bảng user và comment
    public function Users()
    {
        return $this->belongsTo('App\Model\User','id','user_id');
    }

    //Relationship inverse giữa bảng product và comment
    public function Product()
    {
        return $this->belongsTo('App\Model\Product','id','product_id');
    }
}
