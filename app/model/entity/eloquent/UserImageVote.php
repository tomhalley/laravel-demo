<?php

namespace Fototop\Model\Entity\Eloquent;

/**
 * Class UserImageVote
 * @package Fototop\Model\Entity\Eloquent
 *
 * @property int $id
 * @property int $UserID
 * @property int $ImageID
 * @property bool $Vote
 */
class UserImageVote extends \Eloquent
{
    protected $table = "UserImageVote";
}