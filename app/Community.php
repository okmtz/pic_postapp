<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunity extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function user () {
      return $this->hasMany('App/User');
    }
}
