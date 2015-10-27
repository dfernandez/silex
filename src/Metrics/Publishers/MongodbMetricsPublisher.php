<?php

namespace Metrics\Publishers;

use Metrics\MetricsPublisher;
use \MongoClient;
use \MongoDB;
use Silex\Application;

class MongodbMetricsPublisher implements MetricsPublisher
{
    /**
     * @var MongoDB
     */
    private $mongodb;

    public function __construct(Application $app)
    {
        $client = new MongoClient($app->config['metrics.publisher.mongodb.server']);
        $this->mongodb = new MongoDB($client, $app->config['metrics.publisher.mongodb.database']);
    }

    public function push($metric, $value)
    {
        $collection = $this->mongodb->selectCollection($metric);
        $collection->insert([
            'ts' => Date("Y-m-d H:i:s"),
            'data' => $value
        ]);
    }
}