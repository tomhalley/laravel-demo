<?php

use \Fototop\Model\Entity\Eloquent\BaseImage;
/**
* ImageTableSeeder.php
*
* @author     Tom Halley <tomhalley89@gmail.com>
* @package    Fototop
* @category   [SUBSYSTEM NAME]
* @since      10/10/13  14:05
*/

class ImageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table("Image")->delete();

        BaseImage::create(array(
            "Checksum" => "y948ahf94awfh",
            "Title" => "Test Image #1",
            "Description" => "Test Image #1",
            "UserID" => 1,
            "UpdatedAt" => date("Y-m-d h:i:s"),
            "CreatedAt" => date("Y-m-d h:i:s")
        ));
    }
}