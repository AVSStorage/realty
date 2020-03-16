<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sea extends Model
{
    protected $table = 'sea';

    public $timestamps = false;
    protected $fillable = ['object_id','sea_path','sea'];
}
