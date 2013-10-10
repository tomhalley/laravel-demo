<?php

namespace Fototop\Model\Entity\Eloquent;

/**
 * Class Image
 * @package Fototop\Model\Entity\Eloquent
 *
 * @property int $id
 * @property string $Checksum
 * @property string $Title
 * @property string $Caption
 * @property int $UserID
 * @property \DateTime $CreatedAt
 * @property \DateTime $UpdatedAt
 * @property \DateTime $DeletedAt
 */
class BaseImage extends \Eloquent
{
    public $timestamps = false;
    protected $guarded = array('id');
    protected $table = "Image";
}