<?php

namespace ElDelantal\Providers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class FoodsControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $http)
    {
        $controllers = $http['controllers_factory'];
        $controllers
            ->get('/', 'ElDelantal\\Controllers\\FoodsController:indexAction')
            ->bind('FoodsController::index');

        return $controllers;
    }
}
