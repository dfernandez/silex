<?php

namespace Colernio;

use Colernio\Controllers\IndexController;
use Colernio\Controllers\UserController;
use Dough\DoughApp;

class ColernioApp extends DoughApp
{
    public function __construct()
    {
        parent::__construct();

        # Controllers
        $this->mountControllers();
    }

    private function mountControllers()
    {
        $this->mount('/',     IndexController::mount($this['controllers_factory']));
        $this->mount('/user', UserController::mount($this['controllers_factory']));
    }
}
