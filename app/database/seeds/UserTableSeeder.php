<?php

/**
* UserTableSeeder.php
*
* @author     Tom Halley <tomhalley89@gmail.com>
* @package    Fototop
* @category   [SUBSYSTEM NAME]
* @since      08/10/13  17:21
*/

use \Fototop\Model\Entity\Eloquent\BaseUser;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table("User")->delete();

        BaseUser::create(array(
            "Email" => "tomhalley89@gmail.com",
            "Username" => "tomhalley89",
            "Password" => "password",
            "FacebookID" => "489fo4fhofahwf98aej4rf9",
            "UpdatedAt" => date("Y-m-d h:i:s"),
            "CreatedAt" => date("Y-m-d h:i:s")
        ));

        BaseUser::create(array(
            "Email" => "planetaliens98@hotmail.com",
            "Username" => "tom",
            "Password" => "password",
            "FacebookID" => "489fo4fhahwf98aej4rf9",
            "UpdatedAt" => date("Y-m-d h:i:s"),
            "CreatedAt" => date("Y-m-d h:i:s")
        ));
    }
}