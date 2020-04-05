<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'community_id', 'content', 'picture_path'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function community()
    {
        return $this->belongsTo('App\Community');
    }
    //
}
