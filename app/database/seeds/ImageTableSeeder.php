<?php

use \Fototop\Model\Entity\Eloquent\BaseImage;
/**
* ImageTableSeeder.php
*
* @author     Tom Halley <tom.halley@nccgroup.com>
* @package    Fototop
* @category   [SUBSYSTEM NAME]
* @since      10/10/13  14:05
*
* @copyright  Copyright (c) 2013 NCCGroup Ltd.
*/

class ImageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table("Image")->delete();

        BaseImage::create(array(
            "Checksum" => "y948ahf94awfh",
            "Title" => "Test Image #1",
            "Caption" => "Test Image #1",
            "UserID" => 1,
            "UpdatedAt" => date("Y-m-d h:i:s"),
            "CreatedAt" => date("Y-m-d h:i:s")
        ));
    }
}