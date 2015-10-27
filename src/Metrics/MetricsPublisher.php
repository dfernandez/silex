<?php

namespace Metrics;

interface MetricsPublisher {

    /**
     * @param $metric
     * @param $value
     *
     * @return void
     */
    public function push($metric, $value);

}