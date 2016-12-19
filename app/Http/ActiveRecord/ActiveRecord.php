<?php
/**
 * Created by PhpStorm.
 * User: vergedsa
 * Date: 16.12.16
 * Time: 11:24
 */

namespace App\Http\ActiveRecord;

class ActiveRecord
{
    protected static $class_name = 'stdClass';
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
        static::$class_name = get_called_class();
        self::$params = include(ROOT_FOLDER.'/config/db_settings.php');
//        try {
            self::$db = new \PDO(
                'mysql:host='.self::$params['HOST'].';dbname='.self::$params['DBNAME'],
                self::$params['USER'],
                self::$params['PASS'],
                include(ROOT_FOLDER.'/config/pdo_settings.php')
            );
//        } catch (PDOException $e) {
//            exit('Подключение не удалось:'. $e->getMessage());
//        }
    }

    protected static function query(string $query, array $columns = [])
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

    public static function fetchAll($deleted = 'ALL')
    {
        if (false === self::$db) {
            self::init();
        }
        $query = 'SELECT * FROM '. static::$table_name;
        if ('DELETED' == $deleted) {
            $query .= ' WHERE deleted=1';
        } elseif ('ACTIVE' == $deleted) {
            $query .= ' WHERE deleted=0';
        }
        $result = self::query($query);
        return $result->fetchAll();
    }

    public static function fetchOne(int $id, $deleted = 'ALL')
    {
        if (false === self::$db) {
            self::init();
        }
        $query = 'SELECT * FROM '. static::$table_name . ' WHERE id=:id';
        if ('DELETED' == $deleted) {
            $query .= ' AND deleted=1';
        } elseif ('ACTIVE' == $deleted) {
            $query .= ' AND deleted=0';
        }
        $result = self::query($query, ['id' => $id]);
        return $result->fetchAll();
    }

    protected function insert()
    {
        $query = 'INSERT INTO '. static::$table_name
            .' (' . implode(',', array_keys($this->data)) . ')'
         .' VALUES (:' . implode(',:', array_keys($this->data)) . ')';
        return self::query($query, $this->data);
    }

    protected function update()
    {
        $query = 'UPDATE '. static::$table_name . ' SET ';
        foreach (array_keys($this->data) as $key) {
            if ('id'==$key) {
                continue;
            }
            $query .=  $key .'=:'.$key.',';
        }
        $query = substr($query, 0, -1);
        $query .= ' WHERE id=:id';
        return self::query($query, $this->data);
    }

    public function save()
    {
        if (!isset($this->id)) {
            $this->insert();
            echo $this->id = self::$db->lastInsertId();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $query = 'UPDATE '. static::$table_name . ' SET ' .
            'deleted=1';
        $query .= ' WHERE id=:id';
        return self::query($query, $this->data);
    }

    public function unDelete()
    {
        $query = 'UPDATE '. static::$table_name . ' SET ' .
            'deleted=0';
        $query .= ' WHERE id=:id';
        return self::query($query, $this->data);
    }
}
