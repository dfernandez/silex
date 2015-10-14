<?php

namespace Colernio\Controllers;

use Colernio\ColernioApp;
use Dough\Controllers\ControllerInterface;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Response;

class IndexController implements ControllerInterface
{
    public static function mount(ControllerCollection $controllersFactory)
    {
        $controllersFactory->get('/', __CLASS__.'::indexAction');

        return $controllersFactory;
    }

    public function indexAction(ColernioApp $app)
    {
        return $app->render('controllers/indexController/index.html.twig');
    }
}
