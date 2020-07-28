<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    //
    use SoftDeletes;
    protected $table = "news";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id_create',
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

    //Relationship inverse giữa bảng member và user
    public function Users()
    {
        return $this->belongsTo('App\Model\User','id','user_id_create');
    }
}
