<?php
/**
 * Created by PhpStorm.
 * User: vergedsa
 * Date: 26.12.16
 * Time: 3:32
 */

namespace Library\Traits;


trait SetTableProperties
{
    public static function pushTableFields($field)
    {
        array_push(self::$table_fields, $field);
    }
    public static function popTableFields()
    {
        return array_pop(self::$table_fields);
    }

}
