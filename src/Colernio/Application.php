<?php

namespace Colernio;

use Colernio\Controllers\IndexController;
use Silex\Provider\MonologServiceProvider;

class Application extends \Silex\Application
{
    public function __construct(array $params = [])
    {
        parent::__construct($params);

        # Services
        $this->register(new MonologServiceProvider(), [
            'monolog.logfile' => 'logs/app.log',
        ]);

        # Controllers
        $this->mountControllers();
    }

    private function mountControllers()
    {
        $this->get('/', IndexController::class.'::indexAction');
    }
}
