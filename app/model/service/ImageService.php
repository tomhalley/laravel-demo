<?php
namespace Fototop\Model\Service;

use Fototop\Model\Entity\Eloquent\BaseImage;
use Fototop\Model\Entity\Image;
use Fototop\Model\Entity\Repository\ImageRepository;
use Fototop\Model\Entity\Repository\UserRepository;
use Log;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Fototop\Model\Common\Constants;

/**
 * ImageService.php
 * - Handle saving of images to disk
 * - Handle persisting saved images to database
 * - Serve Image objects to caller
 * - Create thumbnails for images
 *
 * @author     Tom Halley <tom.halley@nccgroup.com>
 * @package    Fototop
 * @category   [SUBSYSTEM NAME]
 * @since      10/10/13  09:41
 *
 * @copyright  Copyright (c) 2013 NCCGroup Ltd.
 */

class ImageService
{
    private $userRepo;
    private $imageRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->imageRepo = new ImageRepository();
    }

    /**
     * @param UploadedFile $file
     * @param $title
     * @param $description
     * @param $userId
     * @return bool
     */
    public function saveImage(UploadedFile $file, $title, $description, $userId)
    {
        # Convert image to png if not
        if($file->getMimeType() !== Constants::IMAGE_MIMETYPE) {
            $file = $this->convertImageToSupported($file);
        }

        # Move image to disk
        try {
            $checksum = $this->martialFile($file);
        } catch (\Exception $e) {
            Log::error(
                __CLASS__ .
                "; Failed saving image to disk: " . $e->getMessage() . " @"
                . $e->getLine()
            );
            return false;
        }

        # Persist image to database if it does not already exist in database
        $image = BaseImage::where("Checksum", "=", $checksum)->first();

        if ($image == null) {
            $newImage = new Image();
            $newImage->setTitle($title);
            $newImage->setDescription($description);
            $newImage->setUserID($userId);
            $newImage->setChecksum($checksum);

            $result = $this->imageRepo->save($newImage);

            if (!$result || $result == null) {
                return false;
            }
        }

        return true;
    }

    /**
     * Moves Image file to storage directory
     *
     * @param UploadedFile $file
     * @return string full path of image
     */
    private function martialFile(UploadedFile $file)
    {
        $checksum = sha1(file_get_contents($file));

        if (!file_exists(Constants::IMAGE_DIRECTORY . $checksum)) {
            $file->move(Constants::IMAGE_DIRECTORY, $checksum);
        }

        return $checksum;
    }

    private function convertImageToSupported(UploadedFile $file)
    {
        return $file;
    }
}