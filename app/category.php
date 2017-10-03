<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable=['name','id_sector'];
    public function auteur()
    {
        return $this->belongsTo('sector');
    }
}
