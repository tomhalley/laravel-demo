<?php

use Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Schema\Blueprint;

class UserImageVote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("UserImageVote", function(Blueprint $table)
        {
            $table->increments("id");
            $table->unsignedInteger("UserID");
            $table->unsignedInteger("ImageID");
            $table->tinyInteger("Vote");

            $table->foreign("UserID")->references("id")->on("User");
            $table->foreign("ImageID")->references("id")->on("Image");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("UserImageVote");
    }
}