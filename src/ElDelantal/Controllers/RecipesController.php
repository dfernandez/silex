<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;
use ElDelantal\Model\Recipes;
use Symfony\Component\HttpFoundation\Request;

class RecipesController
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
        $recipes = $this->recipes->getLastRecipes(1);

        $vars = [
            'recipes' => $recipes,
            'adsense' => 0,
        ];

        return $app->render('controllers/RecipesController/index.html.twig', $vars);
    }

    public function recipeAction(ElDelantal $app, Request $request)
    {
        $recipe = $this->recipes->getById($request->get('id'));

        return $app->render('controllers/RecipesController/recipe.html.twig', $recipe);
    }
}
