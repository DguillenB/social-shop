<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = "shops";
    
    public function likes(){
        return $this->hasMany('App\Like');
    }
}
