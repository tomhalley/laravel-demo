<?php
namespace Fototop\Model\Entity;

/**
 * Image Class
 *
 * @author     Tom Halley <tomhalley89@gmail.com>
 * @package    Fototop\Model\Entity
 * @category
 * @since
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
    protected $Description;

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
     * @param $checksum
     * @return $this
     */
    public function setChecksum($checksum)
    {
        $this->Checksum = $checksum;
        return $this;
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
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param $Description
     * @return $this
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
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
        return $this;
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
