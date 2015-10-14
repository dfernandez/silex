<?php

namespace Colernio\Controllers;

use Colernio\ColernioApp;
use Dough\Controllers\ControllerInterface;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Response;

class UserController implements ControllerInterface
{
    public static function mount(ControllerCollection $controllersFactory)
    {
        $controllersFactory->get('/',        __CLASS__.'::indexAction');
        $controllersFactory->get('/login',   __CLASS__.'::loginAction');
        $controllersFactory->get('/logout',  __CLASS__.'::logoutAction');
        $controllersFactory->get('/profile', __CLASS__.'::profileAction');

        return $controllersFactory;
    }

    public function indexAction(ColernioApp $app)
    {
        return $app->render('controllers/userController/index.html.twig');
    }

    public function loginAction(ColernioApp $app)
    {
        return $app->render('controllers/userController/login.html.twig');
    }

    public function logoutAction(ColernioApp $app)
    {
        return $app->render('controllers/userController/logout.html.twig');
    }

    public function profileAction(ColernioApp $app)
    {
        return $app->render('controllers/userController/profile.html.twig');
    }
}
