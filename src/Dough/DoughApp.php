<?php

namespace Dough;

use Metrics\Metrics;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Silex\Application\TwigTrait;
use Silex\Application;

class DoughApp extends Application
{
    use TwigTrait;

    protected $config = [];

    public function __construct()
    {
        $app = $this;
        $app->config = require __DIR__.'/../../config/local.php';

        parent::__construct(['debug' => $app->config['debug']]);

        # Services
        $app->register(new MonologServiceProvider(), $app->config['monolog']);
        $app->register(new TwigServiceProvider(), $app->config['twig']);

        # Web profiling
        if ($app->config['debug'] === true) {
            $app->register(new HttpFragmentServiceProvider());
            $app->register(new ServiceControllerServiceProvider());
            $app->register(new UrlGeneratorServiceProvider());
            $app->register(new WebProfilerServiceProvider(), $app->config['profiler']);
        }

        # Flush metrics
        $app->finish(function() use ($app) {
            $publisher = new $app->config['metrics.publisher']($app);
            Metrics::flush($publisher);
        }, 100);
    }
}
