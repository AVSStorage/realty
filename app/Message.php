<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['message','objects_id','order_id'];



    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A message belong to a objects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function objects() {
        return $this->belongsTo(Objects::class,'object_id');
    }
}
