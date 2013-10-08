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

class UserImageVote extends BaseEntity
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
     * @param Eloquent\UserImageVote $userImageVote
     */
    public function __construct(Eloquent\UserImageVote $userImageVote = null)
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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getImageID()
    {
        return $this->ImageID;
    }

    /**
     * @param mixed $ImageID
     */
    public function setImageID($ImageID)
    {
        $this->ImageID = $ImageID;
    }

    /**
     * @return mixed
     */
    public function getVote()
    {
        return $this->Vote;
    }

    /**
     * @param mixed $Vote
     */
    public function setVote($Vote)
    {
        $this->Vote = $Vote;
    }
}
