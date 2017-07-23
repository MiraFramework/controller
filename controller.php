<?php

namespace Mira;

class Controller
{
    public static function __callStatic($method, $value)
    {
        $request_uri = ltrim($_SERVER['REQUEST_URI'], '/');
        $match_uri = $value[0];

        if (preg_match("@^$match_uri@", $request_uri)) {
            $value[1]();
            return true;
        }
        return false;
    }
}
