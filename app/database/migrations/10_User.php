<?php

use Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Schema\Blueprint;

class User extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('User', function(Blueprint $table)
        {
            $table->increments("id");
            $table->string("Username", 64);
            $table->string("Email", 128);
            $table->string("Password", 128);
            $table->string("FacebookID", 128)->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("User");
	}
}
