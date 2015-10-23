<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;

class IndexController
{
    public function indexAction(ElDelantal $app)
    {
        return $app->render('controllers/IndexController/index.html.twig');
    }
}
