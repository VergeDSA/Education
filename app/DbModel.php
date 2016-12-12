<?php
/**
 * Created by PhpStorm.
 * User: vergedsa
 * Date: 10.12.16
 * Time: 16:18
 */

namespace App;

class DbModel
{
    private static $params = array();
    private static $db = false;

    public function __construct()
    {
        if (false === self::$db) {
            self::init();
        }
    }

    private static function init()
    {
        self::$params = include(ROOT_FOLDER.'/config/db_settings.php');
        try {
            self::$db = new \PDO(
                'mysql:host='.self::$params['HOST'].';dbname='.self::$params['DBNAME'],
                self::$params['USER'],
                self::$params['PASS'],
                array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
            );
        } catch (PDOException $e) {
            exit('Подключение не удалось:'. $e->getMessage());
        }
    }

    public static function query($query_string)
    {
        if (false === self::$db) {
            self::init();
        }
        $return_array = array();
        $result = self::$db->query($query_string);
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $return_array[] = $row;
        };
        return $return_array;
    }
}
