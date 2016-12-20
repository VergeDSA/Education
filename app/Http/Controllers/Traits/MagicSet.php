<?php

namespace App\Http\Controllers\Traits;


trait MagicSet
{
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}

trait MagicGet
{
    public function __get($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
    }
}

trait MagicIsSet
{
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }
}
