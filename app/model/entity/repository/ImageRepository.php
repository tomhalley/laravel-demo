<?php
namespace Fototop\Model\Entity\Repository;

use DB;
use Fototop\Model\Entity\Eloquent\BaseImage;
use Fototop\Model\Entity\Image;

/**
 * ImageRepository.php
 *
 * @author     Tom Halley <tom.halley@nccgroup.com>
 * @package    Fototop
 * @category   Repository
 * @since      08/10/13  14:26
 *
 * @copyright  Copyright (c) 2013 NCCGroup Ltd.
 */
class ImageRepository
{
    /**
     * @param $id
     * @return bool|Image
     */
    public function findById($id)
    {
        /** @var $image BaseImage */
        $image = BaseImage::find($id);

        if ($image == false) {
            return false;
        }

        return new Image($image);
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        $images = BaseImage::all();

        $imageModels = array();
        foreach ($images as $image) {
            $imageModels[] = new Image($image);
        }
        return $imageModels;
    }

    /**
     * @param \Fototop\Model\Entity\Image $image
     * @return mixed
     */
    public function save($image)
    {
        $persistentImage = new BaseImage();

        if ($image->getId() != null) {
            $persistentImage = BaseImage::find($image->getId());

            if ($persistentImage === null) {
                return false;
            }
        }

        $persistentImage->Title = $image->getTitle();
        $persistentImage->Checksum = $image->getChecksum();
        $persistentImage->Description = $image->getDescription();
        $persistentImage->UserID = $image->getUserID();
        $persistentImage->CreatedAt =
        $persistentImage->UpdatedAt = date("Y-m-d h:i:s");
        $persistentImage->CreatedAt = date("Y-m-d h:i:s");

        return $persistentImage->save();
    }

    /**
     * @param Image $entity
     * @return mixed
     */
    public function delete($entity)
    {
        BaseImage::destroy($entity->getId());
    }

    /**
     * @param int $count
     * @return \Illuminate\Pagination\Paginator
     */
    public function paginate($count = 15)
    {
        $images = DB::table("Image")->paginate($count);

        return $images;
    }
}