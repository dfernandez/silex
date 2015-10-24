<?php

namespace ElDelantal\Providers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class RecipesControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $http)
    {
        $controllers = $http['controllers_factory'];
        $controllers
            ->get('/', 'ElDelantal\\Controllers\\RecipesController:indexAction')
            ->bind('RecipesController::index');
        $controllers
            ->get('/{slug}-{id}', 'ElDelantal\\Controllers\\RecipesController:recipeAction')
            ->assert('slug', '[a-z0-9-]+')
            ->assert('id', '\d+')
            ->bind('RecipesController::recipe');

        return $controllers;
    }
}
