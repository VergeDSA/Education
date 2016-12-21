<?php

namespace App;

class BookModel
{
    public static $result;

    public static function getBooksIndex()
    {
//        self::$result = new DbModel();
        return DbModel::query('SELECT * FROM books');
    }

    public static function getBookById($id)
    {
//        self::$result = new DbModel();
        return DbModel::query('SELECT * FROM books WHERE id='.$id);
    }
}
