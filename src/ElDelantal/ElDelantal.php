<?php

namespace ElDelantal;

use Dough\DoughApp;
use ElDelantal\Controllers\CooksController;
use ElDelantal\Controllers\IndexController;
use ElDelantal\Controllers\FoodsController;
use ElDelantal\Controllers\UtensilsController;
use ElDelantal\Controllers\RecipesController;
use ElDelantal\Model\Recipes;
use ElDelantal\Providers\CooksControllerProvider;
use ElDelantal\Providers\FoodsControllerProvider;
use ElDelantal\Providers\IndexControllerProvider;
use ElDelantal\Providers\RecipesControllerProvider;
use ElDelantal\Providers\UtensilsControllerProvider;
use \MongoClient;
use \Twig_Extensions_Extension_Intl;

class ElDelantal extends DoughApp
{
    public function __construct()
    {
        parent::__construct();

        # Services
        $this->registerServices();

        # Controllers
        $this->registerControllers();

        # Routing
        $this->mountControllers();
    }

    private function registerServices()
    {
        $app = $this;

        // Register Twig Intl extension
        $app['twig']->addExtension(new Twig_Extensions_Extension_Intl());

        // Initialize mongoDB client
        $mongoClient = new MongoClient();
        $mongodb = $mongoClient->selectDB('el-delantal');

        $app['services'] = [
            Recipes::class => new Recipes($mongodb),
        ];

        $app['most_popular'] = function () use ($app) {
            return $app['services'][Recipes::class]->getMostPopular();
        };
    }

    private function registerControllers()
    {
        $app = $this;

        $app[IndexController::class] = $app->share(function () use ($app) {
            return new IndexController(
                $app['services'][Recipes::class]
            );
        });

        $app[FoodsController::class] = $app->share(function () use ($app) {
            return new FoodsController();
        });

        $app[CooksController::class] = $app->share(function () use ($app) {
            return new CooksController();
        });

        $app[RecipesController::class] = $app->share(function () use ($app) {
            return new RecipesController(
                $app['services'][Recipes::class]
            );
        });

        $app[UtensilsController::class] = $app->share(function () use ($app) {
            return new UtensilsController();
        });
    }

    private function mountControllers()
    {
        $this->mount('/', new IndexControllerProvider());
        $this->mount('/alimentos', new FoodsControllerProvider());
        $this->mount('/cocineros', new CooksControllerProvider());
        $this->mount('/recetas', new RecipesControllerProvider());
        $this->mount('/utensilios', new UtensilsControllerProvider());
    }
}
