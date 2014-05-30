<?php

class DevController
extends BaseController
{
    public function indexAction()
    {
        return View::make("dev");
    }
}
