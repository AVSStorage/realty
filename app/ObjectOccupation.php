<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectOccupation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'object_occupation';
    public $timestamps = false;

    public function objects() {
        return $this->belongsTo(Objects::class);
    }
}
