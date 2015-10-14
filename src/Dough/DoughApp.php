<?php

namespace Dough;

use Silex\Provider\MonologServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Application\TwigTrait;
use Silex\Application;

class DoughApp extends Application
{
    use TwigTrait;

    protected $config = [];

    public function __construct(array $params = [])
    {
        $this->config = require(__DIR__ . '/../../config/local.php.dist');

        parent::__construct(['debug' => $this->config['debug']]);

        # Services
        $this->register(new MonologServiceProvider(), $this->config['monolog']);
        $this->register(new TwigServiceProvider(), $this->config['twig']);
    }
}
