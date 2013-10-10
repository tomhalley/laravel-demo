<?php

use Fototop\Model\Common\Constants;

/**
* ImageController.php
*
* @author     Tom Halley <tom.halley@nccgroup.com>
* @package    Fototop
* @category   [SUBSYSTEM NAME]
* @since      10/10/13  14:22
*
* @copyright  Copyright (c) 2013 NCCGroup Ltd.
*/

class ImageController extends BaseController
{
    public function imageAction($checksum)
    {
        $path = Constants::IMAGE_DIRECTORY . $checksum . Constants::IMAGE_EXTENSION;

        # check image exists
        if(!file_exists($path)) {
            return View::make("shared/404");
        }

        $image = file_get_contents($path);

        $headers = array(
            "Content-Type" => Constants::IMAGE_MIMETYPE
        );

        return Response::make($image, 200, $headers);
    }

    public function createAction()
    {
        return View::make("image/create");
    }

    public function processAction()
    {
        echo Input::get("title");
    }
}