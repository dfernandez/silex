<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;
use Dough\Controllers\ControllerInterface;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Response;

class UtensilsController implements ControllerInterface
{
    public static function mount(ControllerCollection $controllersFactory)
    {
        $controllersFactory->get('/', __CLASS__.'::indexAction')->bind('UtensilsController::index');

        return $controllersFactory;
    }

    public function indexAction(ElDelantal $app)
    {
        return $app->render('controllers/UtensilsController/index.html.twig');
    }
}
