<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable=['name','category','description','logo','publication','monaie','price'];
    public function auteur()
    {
        return $this->belongsTo('user_admin');
    }
}
