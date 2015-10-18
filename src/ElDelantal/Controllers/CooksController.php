<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;
use Dough\Controllers\ControllerInterface;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Response;

class CooksController implements ControllerInterface
{
    public static function mount(ControllerCollection $controllersFactory)
    {
        $controllersFactory->get('/', __CLASS__.'::indexAction')->bind('CooksController::index');

        return $controllersFactory;
    }

    public function indexAction(ElDelantal $app)
    {
        return $app->render('controllers/CooksController/index.html.twig');
    }
}
