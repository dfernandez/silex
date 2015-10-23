<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;

class FoodsController
{
    public function indexAction(ElDelantal $app)
    {
        return $app->render('controllers/FoodsController/index.html.twig');
    }
}
