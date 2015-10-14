<?php

return [
    # monolog
    'monolog' => [
        'monolog.level'   => \Monolog\Logger::WARNING,
        'monolog.logfile' => __DIR__.'/../logs/app.log',
    ],

    # twig
    'twig' => [
        'twig.path' => __DIR__.'/../views',
    ],

    # debug
    'debug' => false,
];
