<?php

use Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Schema\Blueprint;

class Image extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("Image", function(Blueprint $table)
        {
            $table->increments("id");
            $table->string("Title", 512);
            $table->string("Path", 512);
            $table->string("Caption", 1024)->nullable();
            $table->unsignedInteger("UserID");
            $table->dateTime("CreatedAt");
            $table->dateTime("UpdatedAt");
            $table->dateTime("DeletedAt");

            $table->foreign("UserID")->references("id")->on("User");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists("Image");
	}
}