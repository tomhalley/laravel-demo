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

    /**
     * @var \Fototop\Model\Entity\Repository\ImageRepository imageRepo
     */
    private $imageRepo;

    public function __construct()
    {
        $this->userRepo = new \Fototop\Model\Entity\Repository\UserRepository();
        $this->imageRepo = new \Fototop\Model\Entity\Repository\ImageRepository();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function indexAction()
    {
        $images = $this->imageRepo->paginate(15);

        return View::make("home/index", array("images" => $images));
    }
}