<?php
namespace Fototop\Model\Entity\Repository;

use Fototop\Model\Entity\Eloquent\User as OrmUser;
use Fototop\Model\Entity\User as User;

/**
 * UserRepository.php
 *
 * @author     Tom Halley <tom.halley@nccgroup.com>
 * @package    Fototop
 * @category   Repository
 * @since      08/10/13  14:41
 *
 * @copyright  Copyright (c) 2013 NCCGroup Ltd.
 */

class UserRepository
{
    /**
     * @param $id
     * @return bool|\Fototop\Model\Entity\User
     */
    public function findById($id)
    {
        /** @var $user OrmUser */
        $user = OrmUser::find($id);

        if ($user == false) {
            return false;
        }

        return new User($user);
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        $users = OrmUser::all();

        $userModels = array();
        foreach ($users as $user) {
            $userModels[] = new User($user);
        }
        return $userModels;
    }

    /**
     * @param \Fototop\Model\Entity\User $entity
     * @return mixed|void
     */
    public function save(User $entity)
    {
        $user = new OrmUser();

        if ($entity->getId() != null) {
            $user = OrmUser::find($entity->getId());

            if ($user === null) {
                return false;
            }
        }

        $user->Username = $entity->getUsername();
        $user->Email = $entity->getEmail();
        $user->Password = $entity->getPassword();
        $user->FacebookID = $entity->getFacebookID();
        $user->UpdatedAt = date("Y-m-d h:i:s");
        $user->CreatedAt = date("Y-m-d h:i:s");

        return $user->save();
    }

    /**
     * @param User $entity
     */
    public function delete(User $entity)
    {
        OrmUser::destroy($entity->getId());
    }
}