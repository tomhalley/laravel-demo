<?php
namespace Fototop\Model\Entity;

/**
 * Image Class
 *
 * @author     Tom Halley <tom.halley@nccgroup.com>
 * @package    Fototop\Model\Entity
 * @category
 * @since
 *
 * @copyright  Copyright (c) 2013 NCCGroup Ltd.
 */
class Image
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $Checksum;

    /**
     * @var string
     */
    protected $Title;

    /**
     * @var string
     */
    protected $Caption;

    /**
     * @var int
     */
    protected $UserID;

    /**
     * @var \DateTime
     */
    protected $CreatedAt;

    /**
     * @var \DateTime
     */
    protected $UpdatedAt;

    /**
     * @var \DateTime
     */
    protected $DeletedAt;

    /**
     * @param Eloquent\BaseImage $image
     */
    public function __construct(Eloquent\BaseImage $image = null)
    {
        if ($image !== null) {
            $this->id = $image->id;
            $this->Checksum = $image->Checksum;
            $this->Title = $image->Title;
            $this->Path = $image->Path;
            $this->Caption = $image->Caption;
            $this->UserID = $image->UserID;
            $this->CreatedAt = $image->CreatedAt;
            $this->UpdatedAt = $image->UpdatedAt;
            $this->DeletedAt = $image->DeletedAt;
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getChecksum()
    {
        return $this->Checksum;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param $Title
     * @return $this
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->Caption;
    }

    /**
     * @param $Caption
     * @return $this
     */
    public function setCaption($Caption)
    {
        $this->Caption = $Caption;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * @param $UserID
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->DeletedAt;
    }
}
