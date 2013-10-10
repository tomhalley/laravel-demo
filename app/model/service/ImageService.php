<?php
namespace Fototop\Model\Service;

use Fototop\Model\Entity\Repository\ImageRepository;
use Fototop\Model\Entity\Repository\UserRepository;

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
}