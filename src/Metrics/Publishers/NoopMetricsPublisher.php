<?php

namespace Metrics\Publishers;

use Metrics\MetricsPublisher;

class NoopMetricsPublisher implements MetricsPublisher
{
    public function push($metric, $value)
    {
    }
}