<?php

namespace Colernio\Controllers;

use Colernio\ColernioApp;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function indexAction(ColernioApp $app)
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);

        return $app->render('controllers/indexController/index.html.twig', [], $response);
    }
}
