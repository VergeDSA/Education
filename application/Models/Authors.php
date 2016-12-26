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

class Authors extends ActiveRecord
{
    use Traits\MagicSet, Traits\MagicGet, Traits\MagicIsSet;
    use Traits\GetTableProperties;
    protected static $table_name = 'authors';
    protected static $table_fields = ['id','name','last_name'];
    protected $data = [];
}
