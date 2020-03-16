<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metro extends Model
{
    protected $table = 'metro';

    public $timestamps = false;
    protected $fillable = ['object_id','metro_path','metro'];
}
