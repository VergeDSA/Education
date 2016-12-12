<?php

namespace App;

class CategoryModel
{
    public static $result;

    public static function getCategoryIndex()
    {
//        self::$result = new DbModel();
        return DbModel::query('SELECT * FROM categories ORDER BY title ASC;');
    }

    public static function getCategoryById($id)
    {
//        self::$result = new DbModel();
        return DbModel::query('SELECT * FROM categories WHERE id='.$id);
    }
}
