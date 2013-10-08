<?php
namespace Fototop\Model\Entity;

/**
 * Image.php
 *
 * @author     Tom Halley <tom.halley@nccgroup.com>
 * @package    Fototop
 * @category   Entity
 * @since      08/10/13  16:48
 *
 * @copyright  Copyright (c) 2013 NCCGroup Ltd.
 */
class Image extends BaseEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $Title;

    /**
     * @var string
     */
    protected $Path;

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
     * @param Eloquent\Image $image
     */
    public function __construct(Eloquent\Image $image = null)
    {
        if ($image != null) {
            $this->id = $image->id;
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param mixed $Title
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->Path;
    }

    /**
     * @param mixed $Path
     */
    public function setPath($Path)
    {
        $this->Path = $Path;
    }

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->Caption;
    }

    /**
     * @param mixed $Caption
     */
    public function setCaption($Caption)
    {
        $this->Caption = $Caption;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * @param mixed $UserID
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }

    /**
     * @param mixed $CreatedAt
     */
    public function setCreatedAt($CreatedAt)
    {
        $this->CreatedAt = $CreatedAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }

    /**
     * @param mixed $UpdatedAt
     */
    public function setUpdatedAt($UpdatedAt)
    {
        $this->UpdatedAt = $UpdatedAt;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->DeletedAt;
    }

    /**
     * @param mixed $DeletedAt
     */
    public function setDeletedAt($DeletedAt)
    {
        $this->DeletedAt = $DeletedAt;
    }
}
