<?php

namespace ElDelantal\Providers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class IndexControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $http)
    {
        $controllers = $http['controllers_factory'];
        $controllers
            ->get('/', 'ElDelantal\\Controllers\\IndexController:indexAction')
            ->bind('IndexController::index');

        return $controllers;
    }
}
