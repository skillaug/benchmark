<?php

namespace skillaug;

class Benchmark {

    public static $time, $usage, $peak_usage;

    public static $time_unit, $memory_unit;

    public static function begin ($args = array()) {

        self::$time_unit = !empty($args['time']) ? $args['time'] : NULL;
        self::$memory_unit = !empty($args['memory']) ? $args['memory'] : NULL;

        self::$peak_usage = memory_get_peak_usage ();
        self::$time = microtime(true);
        self::$usage = memory_get_usage ();
    }

    public static function end () {
        $usage = (memory_get_usage () - self::$usage);
        $time = (microtime(true) - self::$time);
        $peak_usage = (memory_get_peak_usage () - self::$peak_usage);
        
        echo "\n";
        echo "\nTime:                     ". self::time_unit_conversion($time, self::$time_unit);
        echo "\nMemory_get_usage:         ". self::memory_unit_conversion($usage, self::$memory_unit);
        echo "\nMemory_get_peak_usage:    ". self::memory_unit_conversion($peak_usage, self::$memory_unit);
    }

    private static function time_unit_conversion ($time, $unit) {

        switch (strtolower($unit)) {
            case 's':
                $unit = 'Second(s)';
                $time = round($time, 4);
                break;
            case 'm':
	            $unit = 'Minute(s)';
                $time = round($time/60, 2);
                break;
            case 'h':
	            $unit = 'Hours(s)';
                $time = round($time/60/60, 2);
                break;
            case 'd':
	            $unit = 'Day(s)';
                $time = round($time/60/60/24, 2);
                break;
            default:
                $unit = 'Mili second(s)';
                $time = round($time * 1000, 0);
                break;
        }

	    return "{$time} {$unit}";
    }

    private static function memory_unit_conversion ($memory, $unit) {

        switch (strtolower($unit)) {
            case 'b':
                $unit = 'Byte(s)';
                break;
            case 'kb':
            	$unit = 'Kilobyte(s)';
                $memory = round($memory/1024, 2);
                break;
            case 'tb':
            	$unit = 'Terabyte(s)';
                $memory = round($memory/1024/1024/1024, 4);
                break;
            default:
                $unit = 'Megabyte(s)';
                $memory = round($memory/1024/1024, 3);
                break;
        }

        return "{$memory} {$unit}";
    }
}