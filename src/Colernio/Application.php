<?php

namespace Colernio;

use Colernio\Controllers\IndexController;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Application\TwigTrait;

class Application extends \Silex\Application
{
    use TwigTrait;

    public function __construct(array $params = [])
    {
        parent::__construct($params);

        # Services
        $this->register(new MonologServiceProvider(), ['monolog.logfile' => __DIR__.'/../../logs/app.log']);
        $this->register(new TwigServiceProvider(), ['twig.path' => __DIR__.'/../../views']);

        # Controllers
        $this->mountControllers();
    }

    private function mountControllers()
    {
        $this->get('/', IndexController::class.'::indexAction');
    }
}
