<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objects extends Model
{

   // use Favoriteable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'objects';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'city' => 'string',
        'string' => 'string',
        'housing' => 'string',
        'house' => 'string',
        'type' => 'int',
    ];

    public function objectPhotos() {
       return $this->hasMany(ObjectsPhoto::class,'object_id');
    }

    public function objectOccupation(){
        return $this->hasOne(ObjectOccupation::class,'object_id');
    }

    public  function objectService() {
        return $this->hasMany(ObjectService::class,'object_id');
    }

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function getServices() {
        return $this->rightJoin('object_service', 'object_service.object_id', '=', 'objects.id')
            ->whereIn('service_id', array(4, 16, 23, 38, 21, 196, 204))
            ->select('value','service_id','objects.id')
            ->get();
    }

    public function getShownObjects(){
        return $this->select('city', 'string', 'housing', 'house', 'type', 'objects.id')
            ->where('status', '=','1')
            ->get();
    }

    public function getSeas(){
        return $this->leftJoin('sea', 'sea.object_id', '=', 'objects.id')
            ->select('objects.id', 'sea', 'sea_path', 'sea.object_id')
            ->whereNotNull('sea')
            ->get();
    }

    public function getPhotos(){
        return $this->leftJoin('object_photos', 'object_photos.object_id', '=', 'objects.id')
                ->select('name', 'objects.id', 'object_id')
                ->get();

    }


    public function getMetros(){
        return $this->leftJoin('metro', 'metro.object_id', '=', 'objects.id')
            ->select('objects.id', 'metro', 'metro_path')
            ->whereNotNull('metro')
            ->get();
    }

    public function orders() {

        return $this->hasMany(Orders::class,'object_id');
    }
    /**
     * An object can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function objects()
    {
        return $this->hasMany('App\ObjectService','object_id');
    }
}
