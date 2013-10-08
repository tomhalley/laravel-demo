<?php
namespace Fototop\Model\Entity\Repository;

use Fototop\Model\Entity\BaseEntity;

/**
* UserRepository.php
*
* @author     Tom Halley <tom.halley@nccgroup.com>
* @package    Fototop
* @category   [SUBSYSTEM NAME]
* @since      08/10/13  14:41
*
* @copyright  Copyright (c) 2013 NCCGroup Ltd.
*/

class UserRepository implements iRepository
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
        // TODO: Implement delete() method.
    }
}