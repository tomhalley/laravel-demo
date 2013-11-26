<?php
namespace Fototop\Model\Entity\Repository;

use Fototop\Model\Entity\Eloquent\BaseUser;
use Fototop\Model\Entity\User;

/**
 * UserRepository.php
 *
 * @author     Tom Halley <tomhalley89@gmail.com>
 * @package    Fototop
 * @category   Repository
 * @since      08/10/13  14:41
 */

class UserRepository
{
    /**
     * @param $id
     * @return bool|\Fototop\Model\Entity\User
     */
    public function findById($id)
    {
        /** @var $user BaseUser */
        $user = BaseUser::find($id);

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
        $users = BaseUser::all();

        $userModels = array();
        foreach ($users as $user) {
            $userModels[] = new User($user);
        }
        return $userModels;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function save(User $user)
    {
        $persistentUser = new BaseUser();

        if ($user->getId() != null) {
            $persistentUser = BaseUser::find($user->getId());

            if ($persistentUser === null) {
                return false;
            }
        }

        $persistentUser->Username = $user->getUsername();
        $persistentUser->Email = $user->getEmail();
        $persistentUser->Password = $user->getPassword();
        $persistentUser->FacebookID = $user->getFacebookID();
        $persistentUser->UpdatedAt = date("Y-m-d h:i:s");
        $persistentUser->CreatedAt = date("Y-m-d h:i:s");

        return $persistentUser->save();
    }

    /**
     * @param User $user
     */
    public function delete(User $user)
    {
        BaseUser::destroy($user->getId());
    }
}