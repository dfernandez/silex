<?php

return [
    # monolog
    'monolog' => [
        'monolog.level' => \Monolog\Logger::WARNING,
        'monolog.logfile' => __DIR__.'/../var/logs/app.log',
    ],

    # twig
    'twig' => [
        'twig.path' => __DIR__.'/../src/ElDelantal/Views',
    ],

    # profiler
    'profiler' => [
        'profiler.cache_dir' => __DIR__.'/../var/cache/profiler',
        'profiler.mount_prefix' => '/_profiler',
    ],

    # debug
    'debug' => false,
];
