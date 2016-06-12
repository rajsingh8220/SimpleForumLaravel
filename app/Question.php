<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\User;
class Question extends Model
{
    //
    public function  user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment','question_id');
    }
}
