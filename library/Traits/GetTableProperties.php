<?php
/**
 * Created by PhpStorm.
 * User: vergedsa
 * Date: 26.12.16
 * Time: 3:32
 */

namespace Library\Traits;


trait GetTableProperties
{
    public static function getTableName() {
        return self::$table_name;
    }
    public static function getTableFields() {
        return self::$table_fields;
    }
}
