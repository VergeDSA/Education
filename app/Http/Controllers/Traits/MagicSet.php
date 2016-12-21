<?php

namespace App\Http\Controllers\Traits;

trait MagicSet
{
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}
