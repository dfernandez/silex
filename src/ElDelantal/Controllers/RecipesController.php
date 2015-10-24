<?php

namespace ElDelantal\Controllers;

use ElDelantal\ElDelantal;
use ElDelantal\Model\Recipes;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $recipes = $this->recipes->getLastRecipes();

        $vars = [
            'recipes' => $recipes,
            'adsense' => 1,
        ];

        return $app->render('controllers/RecipesController/index.html.twig', $vars);
    }

    public function recipeAction(ElDelantal $app, Request $request)
    {
        $recipe = $this->recipes->getBySlug($request->get('slug'));

        if ($recipe === null) {
            $response = new Response();
            $response->setStatusCode(Response::HTTP_NOT_FOUND);
            return $app->render('layout/404.html.twig', [], $response);
        }

        return $app->render('controllers/RecipesController/recipe.html.twig', $recipe);
    }
}
