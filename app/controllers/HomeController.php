<?php

/**
 * HomeController Class
 *
 * @author     Tom Halley <tomhalley89@gmail.com>
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

    public function viewImageAction($id)
    {
        $image = $this->imageRepo->findById($id);

        if($image === false) {
            return Redirect::route("home");
        }

        return View::make("home/view", array("image" => $image));
    }
}