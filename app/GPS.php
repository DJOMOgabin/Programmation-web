<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GPS extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'latitude','longitude',
    ];

}
