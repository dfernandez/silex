<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;

class UtensilsController
{
    public function indexAction(ElDelantal $app)
    {
        return $app->render('controllers/UtensilsController/index.html.twig');
    }
}
