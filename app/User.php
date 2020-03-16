<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Notifications\AccountVerification;


class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    //use Favoriteability;

    protected $attributes = [
      'phone_number' => '',
        'country' => '',
        'city' => '',
        'region' => '',
        'sex' => 0,
        'surname' => ''
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','email','password','country','region','city','sex'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function getClientRole(){
        $client = new Role();
        $client->name         = 'client';
        $client->display_name = 'Клиент'; // optional
        $client->description  = 'Роль клиент'; // optional
        $client->save();

        return $client;
    }


    public function orders() {
        return $this->hasMany(Orders::class);
    }

    public function objects() {
        return $this->hasMany(Objects::class);
    }

    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification($user = null, $password = null)
    {
        $this->notify(new AccountVerification($user, $password)); // my notification
    }

    public function getOwnerRole(){
        $owner = new Role();
//        $owner->name         = 'owner';
//        $owner->display_name = 'Владелец'; // optional
//        $owner->description  = 'Роль владелец'; // optional
//        $owner->save();

        return $owner->find(1);
    }
}
