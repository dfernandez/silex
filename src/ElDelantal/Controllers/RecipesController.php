<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;
use ElDelantal\Model\Recipes;

class RecipesController
{
    public function __construct(Recipes $recipes)
    {
        ;
    }

    public function indexAction(ElDelantal $app)
    {
        return $app->render('controllers/RecipesController/index.html.twig');
    }
}
