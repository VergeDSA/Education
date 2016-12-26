<?php

namespace App\Models;

use Library\ActiveRecord\ActiveRecord;
use Library\Traits;

/**
 * Class AuthorsActiveRecord
 * @package App\Http\ActiveRecord
 * @property $id
 * @property $name
 * @property $last_name
 * @property $created_at
 * @property $updated_at
 */

class Categories extends ActiveRecord
{
    use Traits\MagicSet, Traits\MagicGet, Traits\MagicIsSet;
    use Traits\GetTableProperties;
    protected static $table_name = 'categories';
    protected static $table_fields = ['id','title'];
    protected $data = [];
}
