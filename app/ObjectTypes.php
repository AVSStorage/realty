<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectTypes extends Model
{

    protected $table = "object_types";

    public function subTypes() {
        return $this->hasMany(ObjectSubTypes::class,'type_id','id');
    }


    public function objects(){
        return $this->belongsTo(Objects::class, 'type','id');
    }
}
