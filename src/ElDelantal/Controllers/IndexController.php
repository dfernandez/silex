<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;
use ElDelantal\Model\Recipes;

class IndexController
{
    /**
     * @var Recipes
     */
    private $recipes;

    public function __construct(Recipes $recipes)
    {
        $this->recipes = $recipes;
    }

    public function indexAction(ElDelantal $app)
    {
        $recipes = $this->recipes->getLastRecipes();

        $vars = [
            'recipes' => $recipes,
            'adsense' => 1,
        ];

        return $app->render('controllers/IndexController/index.html.twig', $vars);
    }
}
