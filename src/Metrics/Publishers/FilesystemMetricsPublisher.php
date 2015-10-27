<?php

namespace Metrics\Publishers;

use Metrics\MetricsPublisher;

class FilesystemMetricsPublisher implements MetricsPublisher
{
    public function push($metric, $value)
    {
        file_put_contents('metrics', Date("Y-m-d H:i:s") . " " . json_encode([$metric => $value]) . "\n", FILE_APPEND);
    }
}