<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;

class CooksController
{
    public function indexAction(ElDelantal $app)
    {
        return $app->render('controllers/CooksController/index.html.twig');
    }
}
