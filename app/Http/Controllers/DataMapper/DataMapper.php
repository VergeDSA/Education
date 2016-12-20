<?php
/**
 * Created by PhpStorm.
 * User: vergedsa
 * Date: 16.12.16
 * Time: 11:24
 */

namespace App\Http\Controllers\DataMapper;

class DataMapper
{
    protected static $class_name = 'stdClass';
    private static $params = array();
    private static $db = false;

    public function __construct($db)
    {
        self::$db = $db;
    }

    protected static function queryMySQL(string $query, array $columns = [])
    {
        $ph_columns = [];
        if (!empty($columns)) {
            foreach ($columns as $key => $value) {
                $ph_columns[':' . $key] = $value;
            }
        }
        $result = self::$db->prepare($query);
        $result->execute($ph_columns);
        return $result;
    }

    public static function fetchAllMySQL($class, $deleted = 'ALL')
    {
//        if (false === self::$db) {
//            self::init();
//        }
        $query = 'SELECT * FROM '. $class::$table_name;
        if ('DELETED' == $deleted) {
            $query .= ' WHERE deleted=1';
        } elseif ('ACTIVE' == $deleted) {
            $query .= ' WHERE deleted=0';
        }
        $result = self::queryMySQL($query);
        return $result->fetchAll();
    }

    public static function fetchOneMySQL($class, int $id, $deleted = 'ALL')
    {
//        if (false === self::$db) {
//            self::init();
//        }
        $query = 'SELECT * FROM '. $class::$table_name . ' WHERE id=:id';
        if ('DELETED' == $deleted) {
            $query .= ' AND deleted=1';
        } elseif ('ACTIVE' == $deleted) {
            $query .= ' AND deleted=0';
        }
        $result = self::queryMySQL($query, ['id' => $id]);
        return $result->fetchAll();
    }

    private function insertMySQL($class)
    {
        $query = 'INSERT INTO '. $class::$table_name
            .' (' . implode(',', array_keys($class->data)) . ')'
         .' VALUES (:' . implode(',:', array_keys($class->data)) . ')';
        return self::queryMySQL($query, $class->data);
    }

    private function updateMySQL($class)
    {
        $query = 'UPDATE '. $class::$table_name . ' SET ';
        foreach (array_keys($class->data) as $key) {
            if ('id'==$key) {
                continue;
            }
            $query .=  $key .'=:'.$key.',';
        }
        $query = substr($query, 0, -1);
        $query .= ' WHERE id=:id';
        return self::queryMySQL($query, $class->data);
    }

    public function saveMySQL($class)
    {
        if (!isset($class->id)) {
            $this->insertMySQL($class);
            echo $class->id = self::$db->lastInsertId();
        } else {
            $this->updateMySQL($class);
        }
    }

    public function deleteMySQL($class)
    {
        $query = 'UPDATE '. $class::$table_name . ' SET ' .
            'deleted=1';
        $query .= ' WHERE id=:id';
        return self::queryMySQL($query, $class->data);
    }

    public function unDeleteMySQL($class)
    {
        $query = 'UPDATE '. $class::$table_name . ' SET ' .
            'deleted=0';
        $query .= ' WHERE id=:id';
        return self::queryMySQL($query, $class->data);
    }
}
