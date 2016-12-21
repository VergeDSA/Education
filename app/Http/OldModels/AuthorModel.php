<?php

namespace App;

class AuthorModel
{
    public static $result;

    public static function getAuthorsIndex()
    {
//        self::$result = new DbModel();
        return DbModel::query('SELECT * FROM authors ORDER BY last_name ASC;');
    }

    public static function getAuthorById($id)
    {
//        self::$result = new DbModel();
        return DbModel::query('SELECT * FROM authors WHERE id='.$id);
    }
}
