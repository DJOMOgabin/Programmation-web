<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    //
    public function user(){
        return $this->belongsTo('User');
    }
    protected $fillable = [
        'category','description','sector','name','price','logo','rang'
    ];

}
