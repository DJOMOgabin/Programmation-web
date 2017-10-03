<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function gps(){
        return $this->hasOne('App\GPS');
    }
    public function theme(){
        return $this->hasOne('App\Theme');
    }
    public function serviceProviders(){
        return $this->hasMany('App\ServiceProvider');
    }
    protected $fillable = [
        'name', 'email', 'password','phone','country','town','address','pobox','gps','typeOfUser','firstname','shortname','civility','language','currency','dateNaiss',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
