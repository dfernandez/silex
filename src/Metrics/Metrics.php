<?php

namespace Metrics;

class Metrics
{
    /**
     * @var array
     */
    private static $startedTimers = [];

    /**
     * @var array
     */
    private static $stats = [];

    public static function startTimer($timer)
    {
        self::$startedTimers[$timer] = microtime(true);
    }

    public static function stopTimer($timer)
    {
        if (!array_key_exists($timer, self::$startedTimers)) {
            return;
        }

        self::$stats[$timer] = self::msDelta(self::$startedTimers[$timer]);

        unset(self::$startedTimers[$timer]);
    }

    public static function flush(MetricsPublisher $publisher)
    {
        self::$stats['app.timer.execution'] = self::msDelta($_SERVER["REQUEST_TIME_FLOAT"]);

        foreach (self::$stats as $metric => $value) {
            $publisher->push($metric, $value);
        }
    }

    private static function msDelta($startTime)
    {
        $ms = (microtime(true) - $startTime) * 1000;
        return round($ms, 2);
    }
}