<?php
/**
 * Created by PhpStorm.
 * User: vergedsa
 * Date: 16.12.16
 * Time: 11:24
 */

namespace Library\ActiveRecord;

use \App\Models;

class ActiveRecord
{
    protected static $class_name = 'stdClass';
    protected static $table_fields = ['*'];
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
        self::$params = include(ROOT_FOLDER . '/application/Config/db_settings.php');
//        try {
        self::$db = new \PDO(
            'mysql:host=' . self::$params['HOST'] . ';dbname=' . self::$params['DBNAME'],
            self::$params['USER'],
            self::$params['PASS'],
            include(ROOT_FOLDER . '/application/Config/pdo_settings.php')
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
//        echo $query; die;
        $result = self::$db->prepare($query);
        $result->execute($ph_columns);
        return $result;
    }

    public static function fetchAll($deleted = 'ALL', $joins = [])
    {
        if (false === self::$db) {
            self::init();
        }
        $query = self::buildQuery($stn = static::$table_name, $stf = static::$table_fields, $deleted, $joins);
        $query['query_start'] .= ' FROM ' . $stn;
        echo implode('', $query);
        die;
        $result = self::query(implode('', $query));
        return $result->fetchAll();
    }

    public static function fetchOne(int $id, $deleted = 'ALL', $joins = [])
    {
        if (false === self::$db) {
            self::init();
        }
        $query = self::buildQuery($stn = static::$table_name, $stf = static::$table_fields, $deleted, $joins);
        $query['query_start'] .= ' FROM ' . $stn;
        $query['query_end'] = ' WHERE ' . $stn . '.id=:id'.$query['query_end'];
        echo implode('', $query);
        die;
        $result = self::query(implode('', $query), ['id' => $id]);
        return $result->fetchAll();
    }

    protected static function buildQuery($stn, $stf, $deleted, $joins)
    {

        $query = 'SELECT ' . $stn . '.' . implode(',' . $stn . '.', $stf);
        $query_middle = '';
        $query_end = '';
        if ('DELETED' == $deleted) {
            $query_end .= ' WHERE ' . $stn . '.deleted=1';
        } elseif ('ACTIVE' == $deleted) {
            $query_end .= ' WHERE ' . $stn . '.deleted=0';
        }
        if (!empty($joins)) {
            foreach ($joins as $join_obj => $join_params) {
                $join_class = '\App\Models\\' . $join_obj;
                $join_table = $join_class::getTableName();
                $join_fields = $join_class::getTableFields();
//                var_dump($join_fields);
//                die;
                $query .= ',' . $join_table . '.' . implode(',' . $join_table . '.', $join_fields);
                $query .= ' as ' . $join_table . '.*';
                list($join_method, $join_condition_left, $join_condition_right) = explode('/', $join_params);
                $query_middle .= ' ' . strtoupper($join_method) . ' JOIN ' . $join_table . ' ON';
                $query_middle .= ' ' . $join_condition_left . '=' . $join_condition_right;
                if ('DELETED' == $deleted) {
                    $query_end .= ' AND ' . $join_table . '.deleted=1';
                } elseif ('ACTIVE' == $deleted) {
                    $query_end .= ' AND ' . $join_table . '.deleted=0';
                }
            }
        }
        return array(
            'query_start' => $query,
            'query_middle' => $query_middle,
            'query_end' => $query_end);
    }

    private function insert()
    {
        $query = 'INSERT INTO '. static::$table_name
            .' (' . implode(',', array_keys($this->data)) . ')'
         .' VALUES (:' . implode(',:', array_keys($this->data)) . ')';
        return self::query($query, $this->data);
    }

    private function update()
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
