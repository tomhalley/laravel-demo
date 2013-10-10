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
 * @property \DateTime $CreatedAt
 * @property \DateTime $UpdatedAt
 */
class BaseUser extends \Eloquent
{
    public $timestamps = false;
    protected $hidden = array('Password');
    protected $guarded = array('id', 'Password');
    protected $table = "User";
}