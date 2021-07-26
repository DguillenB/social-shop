<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excluded extends Model
{
    protected $table = "excluded";
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function shop(){
        return $this->belongsTo('App\Shop', 'shop_id');
    }
}
