<?php

use Fototop\Model\Common\Constants;
use Fototop\Model\Entity\Image;

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
    /**
     * @var Fototop\Model\Service\ImageService
     */
    private $imageService;

    public function __construct()
    {
        $this->imageService = new \Fototop\Model\Service\ImageService();
    }

    public function imageAction($checksum)
    {
        $path = Constants::IMAGE_DIRECTORY . $checksum;

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
        $file = Input::file("image");
        $title = Input::get("title");
        $description = Input::get("description");
        $userId = 1;

        if($file !== null) {
            $this->imageService->saveImage($file, $title, $description, $userId);
        }

        return Redirect::route("home");
    }
}