<?php

namespace ElDelantal;

use ElDelantal\Controllers\CooksController;
use ElDelantal\Controllers\IndexController;
use ElDelantal\Controllers\FoodsController;
use ElDelantal\Controllers\MeasuresController;
use ElDelantal\Controllers\RecipesController;
use Dough\DoughApp;

class ElDelantal extends DoughApp
{
    public function __construct()
    {
        parent::__construct();

        # Controllers
        $this->mountControllers();
    }

    private function mountControllers()
    {
        $this->mount('/',          IndexController::mount($this['controllers_factory']));
        $this->mount('/alimentos', FoodsController::mount($this['controllers_factory']));
        $this->mount('/cocineros', CooksController::mount($this['controllers_factory']));
        $this->mount('/medidas',   MeasuresController::mount($this['controllers_factory']));
        $this->mount('/recetas',   RecipesController::mount($this['controllers_factory']));
    }
}
