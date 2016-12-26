<?php

namespace App\Models;

use Library\ActiveRecord\ActiveRecord;
use Library\DataMapper\DataMapperMySQL;
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

class Books extends ActiveRecord
{
    use Traits\MagicSet, Traits\MagicGet, Traits\MagicIsSet;
    use Traits\GetTableProperties, Traits\SetTableProperties;
    public static $table_name = 'books';
    protected static $table_fields = ['id','title','number_of_pages','year'];
    public $data = [];
}
