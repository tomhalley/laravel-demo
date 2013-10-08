<?php
namespace Fototop\Model\Entity\Repository;

use Fototop\Model\Entity\BaseEntity;
use Fototop\Model\Entity\Eloquent\Image;

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
class ImageRepository implements iRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param BaseEntity $entity
     * @return mixed
     */
    public function save(BaseEntity $entity)
    {
        // TODO: Implement save() method.
    }

    /**
     * @param BaseEntity $entity
     * @return mixed
     */
    public function delete(BaseEntity $entity)
    {
        Image::destroy($entity->getId());
    }
}