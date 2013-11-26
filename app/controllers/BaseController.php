<?php

/**
 * BaseController Class
 *
 * @author     Tom Halley <tomhalley89@gmail.com>
 */
class BaseController extends Controller
{
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function makeView($class, $method, $data = null)
    {
        $classViewPath = strtolower(str_replace("Controller", "", $class));
        $actionViewPath = strtolower(str_replace("Action", "", $method));
        return View::make($classViewPath . "/" . $actionViewPath, $data);
    }
}