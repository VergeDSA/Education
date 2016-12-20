<?php

namespace App;
use App\Http\Controllers\DataMapper\DataMapper;
use App\Http\Controllers\Traits;
/**
 * Class AuthorsActiveRecord
 * @package App\Http\ActiveRecord
 * @property $id
 * @property $name
 * @property $last_name
 * @property $created_at
 * @property $updated_at
 */

class BooksDataMapper
{
    use Traits\MagicSet, Traits\MagicGet, Traits\MagicIsSet;
    public static $table_name = 'books';
    public $data = [];
}
