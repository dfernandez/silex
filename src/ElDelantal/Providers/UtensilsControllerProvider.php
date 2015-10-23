<?php

namespace ElDelantal\Providers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class UtensilsControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $http)
    {
        $controllers = $http['controllers_factory'];
        $controllers
            ->get('/', 'ElDelantal\\Controllers\\UtensilsController:indexAction')
            ->bind('UtensilsController::index');

        return $controllers;
    }
}
