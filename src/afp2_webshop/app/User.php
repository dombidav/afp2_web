<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $incrementing = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function testUser() : User
    {
        $user = User::query()->where('id', '=', '0');
        if($user->count() > 0)
            return $user->get()->last();
        factory(User::class)->create();
        return User::all()->last();

    }

    public function billing(){
        //return $this->hasOne(App\Billing::class);
    }

    public function shipping(){
        //return $this->hasOne(App\Shipping::class);
    }

}
