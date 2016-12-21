<?php

namespace App;

use App\Http\Controllers\ActiveRecord\ActiveRecord;
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

class CategoriesActiveRecord extends ActiveRecord
{
    use Traits\MagicSet, Traits\MagicGet, Traits\MagicIsSet;
    protected static $table_name = 'categories';
    protected $data = [];
}
