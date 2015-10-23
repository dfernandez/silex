<?php

namespace ElDelantal\Providers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class CooksControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $http)
    {
        $controllers = $http['controllers_factory'];
        $controllers
            ->get('/', 'ElDelantal\\Controllers\\CooksController:indexAction')
            ->bind('CooksController::index');

        return $controllers;
    }
}
