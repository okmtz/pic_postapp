<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PicFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('pic_favorites', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->integer('pos_x');
            $table->integer('pos_y');
            $table->timestamps();
           
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
