<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic_favorite extends Model
{
    protected $fillable = ['pos_x', 'pos_y', 'user_id', 'post_id'];
    //
}
