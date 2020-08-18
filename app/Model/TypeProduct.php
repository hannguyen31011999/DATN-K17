<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TypeProduct extends Model
{
    //
    use SoftDeletes;
    protected $table = "type_product";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
    	'type_name',
    	'description',
    	'image',
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

    // Relationship 1-n với bảng product
    public function Products()
    {
        return $this->hasMany('App\Model\Product','type_product_id','id');
    }
    public function delete()
    {
        $this->Products()->delete();

        return parent::delete();
    }
}
