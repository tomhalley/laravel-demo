<?php

class HomeController extends BaseController
{
    public function indexAction()
    {
        $data = array(
            "name" => "Tom"
        );

        return $this->makeView(__CLASS__, __FUNCTION__, $data);
    }
}