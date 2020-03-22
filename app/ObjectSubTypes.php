<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectSubTypes extends Model
{
    protected $table = "object_subtypes";


    public function types(){
        return $this->belongsTo(ObjectTypes::class, 'id','type_id');
    }
}
