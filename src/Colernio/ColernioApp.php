<?php

namespace Colernio;

use Colernio\Controllers\IndexController;
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
        $this->get('/', IndexController::class.'::indexAction');
    }
}
