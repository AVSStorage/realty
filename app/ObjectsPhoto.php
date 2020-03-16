<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectsPhoto extends Model
{
    public $timestamps = false;
    protected $table = 'object_photos';
    protected $fillable = ['object_id','name','path','extension','description'];


    public function objects() {
        return $this->belongsTo(Objects::class);
    }
}
