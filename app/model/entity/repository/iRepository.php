<?php
namespace Fototop\Model\Entity\Repository;

use Fototop\Model\Entity\BaseEntity;

/**
* iRepository.php
*
* @author     Tom Halley <tom.halley@nccgroup.com>
* @package    Fototop
* @category   [SUBSYSTEM NAME]
* @since      08/10/13  17:08
*
* @copyright  Copyright (c) 2013 NCCGroup Ltd.
*/

interface iRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param BaseEntity $entity
     * @return mixed
     */
    public function save(BaseEntity $entity);

    /**
     * @param BaseEntity $entity
     * @return mixed
     */
    public function delete(BaseEntity $entity);
}