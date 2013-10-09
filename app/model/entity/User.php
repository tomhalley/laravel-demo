<?php

namespace Fototop\Model\Entity;

/**
 * User.php
 *
 * @author     Tom Halley <tom.halley@nccgroup.com>
 * @package    Fototop
 * @category   Entity
 * @since      08/10/13  14:31
 *
 * @copyright  Copyright (c) 2013 NCCGroup Ltd.
 */
class User extends BaseEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $Username;

    /**
     * @var string
     */
    protected $Email;

    /**
     * @var string
     */
    protected $Password;

    /**
     * @var string
     */
    protected $FacebookID;

    /**
     * @var
     */
    protected $CreatedAt;

    /**
     * @var
     */
    protected $UpdatedAt;

    /**
     * @param Eloquent\User $user
     */
    public function __construct(Eloquent\User $user = null)
    {
        if ($user !== null) {
            $this->id = $user->id;
            $this->Username = $user->Username;
            $this->Email = $user->Email;
            $this->Password = $user->Password;
            $this->FacebookID = $user->FacebookID;
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
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * @param $username string
     * @return $this User
     */
    public function setUsername($username)
    {
        $this->Username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->Email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->Password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacebookID()
    {
        return $this->FacebookID;
    }

    /**
     * @param $facebookId
     * @return $this
     */
    public function setFacebookID($facebookId)
    {
        $this->FacebookID = $facebookId;
        return $this;
    }

    /**
     * @return mixed
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
}
