<?php

namespace Fototop\Model\Entity\Eloquent;

/**
 * Class User
 * @package Fototop\Model\Entity\Eloquent
 *
 * @property int $id
 * @property string $Username
 * @property string $Email
 * @property string $Password
 * @property string $FacebookID
 */
class User extends \Eloquent
{
    protected $table = "User";
}