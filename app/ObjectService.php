<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectService extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'object_service';

    public $timestamps = false;
    protected $fillable = ['object_id','service_id','value'];


    public function objects(){
        return $this->belongsTo(Objects::class);
    }
}
