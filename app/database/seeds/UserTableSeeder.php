<?php

/**
* UserTableSeeder.php
*
* @author     Tom Halley <tom.halley@nccgroup.com>
* @package    Fototop
* @category   [SUBSYSTEM NAME]
* @since      08/10/13  17:21
*
* @copyright  Copyright (c) 2013 NCCGroup Ltd.
*/

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table("User")->delete();

        \Fototop\Model\Entity\Eloquent\User::create(array(
            "Email" => "tomhalley89@gmail.com",
            "Username" => "tomhalley89",
            "Password" => "password",
            "FacebookID" => "489fo4fhofahwf98aej4rf9"
        ));
    }
}