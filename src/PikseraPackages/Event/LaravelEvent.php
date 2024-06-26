<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */
namespace PikseraPackages\Event;

use Illuminate\Support\Facades\Event;

class LaravelEvent
{
    public static $hooks = array();

    public static function listen($event_name, $callback)
    {
        return self::event_bind($event_name, $callback);
    }

    /**
     * @param $event_name
     * @param mixed $data
     *
     * @return mixed
     */
    public static function fire($event_name, $data = false)
    {
        if (isset(self::$hooks[$event_name])) {
            $fns = self::$hooks[$event_name];
            if (is_array($fns)) {
                $resp = array();
                foreach ($fns as $fn) {
                    if (is_callable($fn)) {
                        $resp[] = call_user_func($fn, $data);
                    } elseif (function_exists($fn)) {
                        $resp[] = $fn($data);
                    }
                }
                return $resp;
            }
        }

        $args = func_get_args();
        array_shift($args);
        if (count($args) == 1) {
            $args = $args[0];
            if (is_array($args)) {
                $args = array($args);
            }
        }

        // Laravel event
        // return Event::fire($api_function, $args); TODO
    }

    public static function event_bind($hook_name, $callback = false)
    {
        if (is_string($callback) and (function_exists($callback))) {
            if (!isset(self::$hooks[$hook_name])) {
                self::$hooks[$hook_name] = array();
            }
            self::$hooks[$hook_name][] = $callback;
        } else {
            // Laravel Event Listen not work properly
            self::$hooks[$hook_name][] = $callback;
            //Event::listen($hook_name, $callback);
        }
    }
}
