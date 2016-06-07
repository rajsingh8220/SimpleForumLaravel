<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
//use App\Profile;

class User extends Model implements Authenticatable
{
    //
    use \Illuminate\Auth\Authenticatable;
    public function profile(){
        return $this->hasOne('App\Profile','userid');
    }
    
    public function questions(){
        return $this->hasMany('App\Question');
    }
}
