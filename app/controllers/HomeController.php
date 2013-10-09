<?php

/**
 * HomeController Class
 *
 * @author     Tom Halley <tom.halley@nccgroup.com>
 * @copyright  Copyright (c) 2013 NCCGroup Ltd.
 */
class HomeController extends BaseController
{
    /**
     * @var \Fototop\Model\Entity\Repository\UserRepository userRepo
     */
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new \Fototop\Model\Entity\Repository\UserRepository();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function indexAction()
    {
        $user = $this->userRepo->findById(1);

        if($user !== false) {
            return $this->makeView(__CLASS__, __FUNCTION__, array("name" => $user->getUsername()));
        }
        return $this->makeView(__CLASS__, __FUNCTION__);
    }

    /**
     * @param $name
     * @return \Illuminate\View\View
     */
    public function helloAction($name)
    {
        return View::make("home/index", array("name" => $name));
    }
}