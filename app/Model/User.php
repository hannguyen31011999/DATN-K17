<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "user";
    
    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
        'name',
        'phone',
        'address',
        'role',
        'status',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'created_at'=>'datetime:d/m/Y - H:i',
        'updated_at'=>'datetime:d/m/Y - H:i',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Relationship 1-1 với bảng member
    public function Members()
    {
        return $this->hasOne('App\Model\Member','user_id','id');
    }

    // Relationship 1-n với bảng comment
    public function Comments()
    {
        return $this->hasMany('App\Model\Comment','user_id','id');
    }

    // Relationship 1-n với bảng order
    public function Orders()
    {
        return $this->hasMany('App\Model\Order','customer_id','id');
    }

    // Relationship 1-n với bảng news
    public function News()
    {
        return $this->hasMany('App\Model\News','user_id_create','id');
    }
}
