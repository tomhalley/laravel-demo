<?php
namespace Fototop\Model\Entity;

/**
 * UserImageVote.php
 *
 * @author     Tom Halley <tom.halley@nccgroup.com>
 * @package    Fototop
 * @category   [SUBSYSTEM NAME]
 * @since      08/10/13  17:00
 *
 * @copyright  Copyright (c) 2013 NCCGroup Ltd.
 */

class UserImageVote
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $UserID;

    /**
     * @var
     */
    protected $ImageID;

    /**
     * @var
     */
    protected $Vote;

    /**
     * @param Eloquent\BaseUserImageVote $userImageVote
     */
    public function __construct(Eloquent\BaseUserImageVote $userImageVote = null)
    {
        if ($userImageVote !== null) {
            $this->id = $userImageVote->id;
            $this->UserID = $userImageVote->UserID;
            $this->ImageID = $userImageVote->ImageID;
            $this->Vote = $userImageVote->Vote;
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
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return $this
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageID()
    {
        return $this->ImageID;
    }

    /**
     * @param $ImageID
     * @return $this
     */
    public function setImageID($ImageID)
    {
        $this->ImageID = $ImageID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVote()
    {
        return $this->Vote;
    }

    /**
     * @param $Vote
     * @return $this
     */
    public function setVote($Vote)
    {
        $this->Vote = $Vote;
        return $this;
    }
}
