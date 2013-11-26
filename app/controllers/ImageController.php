<?php

use Fototop\Model\Common\Constants;
use Fototop\Model\Entity\Image;

/**
 * ImageController Class
 *
 * @author     Tom Halley <tomhalley89@gmail.com>
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

        return Response::make($image, 200, array(
            "Content-Type" => Constants::IMAGE_MIMETYPE
        ));
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