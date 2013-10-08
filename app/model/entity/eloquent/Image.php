<?php

namespace Fototop\Model\Entity\Eloquent;

/**
 * Class Image
 * @package Fototop\Model\Entity\Eloquent
 *
 * @property $id
 * @property $Title
 * @property $Path
 * @property $Caption
 * @property $UserID
 * @property $CreatedAt
 * @property $UpdatedAt
 * @property $DeletedAt
 */
class Image extends \Eloquent
{
    protected $table = "Image";
}