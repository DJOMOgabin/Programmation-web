<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'color1','color2','pathLogo',
    ];
}
