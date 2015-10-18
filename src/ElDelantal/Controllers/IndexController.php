<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;
use Dough\Controllers\ControllerInterface;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Response;

class IndexController implements ControllerInterface
{
    public static function mount(ControllerCollection $controllersFactory)
    {
        $controllersFactory->get('/', __CLASS__.'::indexAction')->bind('IndexController::index');

        return $controllersFactory;
    }

    public function indexAction(ElDelantal $app)
    {
        return $app->render('controllers/IndexController/index.html.twig');
    }
}
