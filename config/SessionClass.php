<?php
/**
 * Created by PhpStorm.
 * User: vergedsa
 * Date: 08.12.16
 * Time: 12:24
 */

namespace Config;


class Session
{
    public static function start()
    {
        if (isset($_COOKIE['PHPSESSID'])) {
            session_start();
        }
    }
    public static function close()
    {
        session_destroy();
    }

}