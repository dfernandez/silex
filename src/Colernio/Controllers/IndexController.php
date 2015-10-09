<?php

namespace Colernio\Controllers;

use Colernio\Application;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function indexAction(Application $app)
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_BAD_REQUEST);

        return $app->render('indexController/index.twig', [], $response);
    }
}
