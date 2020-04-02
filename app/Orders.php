<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Orders extends Model
{

    use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';
    protected $fillable = ['object_id','user_id','date_from','date_to','status','parents','children','totalPrice'];

    public function objects() {
        return $this->belongsTo(Objects::class,'id');
    }


    public function users() {
        return $this->belongsTo(User::class,'id');
    }
}
