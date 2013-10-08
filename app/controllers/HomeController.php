<?php

class HomeController extends BaseController
{
    public function indexAction()
    {
        return $this->makeView(__CLASS__, __FUNCTION__, array("name" => "Tom"));
    }

    public function helloAction($name)
    {
        return View::make("home/index", array("name" => $name));
    }
}