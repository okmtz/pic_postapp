<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function users () {
      return $this->hasMany('App/User');
    }
    public function posts () {
      return $this->hasMany('App\Post');
    }
}
