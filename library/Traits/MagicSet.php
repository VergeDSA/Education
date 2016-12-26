<?php

namespace Library\Traits;

trait MagicSet
{
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}
