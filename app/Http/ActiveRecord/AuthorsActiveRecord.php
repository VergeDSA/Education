<?php

namespace App\Http\ActiveRecord;

/**
 * Class AuthorsActiveRecord
 * @package App\Http\ActiveRecord
 * @property $id
 * @property $name
 * @property $last_name
 * @property $created_at
 * @property $updated_at
 */

class AuthorsActiveRecord extends ActiveRecord
{
    protected static $table_name = 'authors';
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name]=$value;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }
}
