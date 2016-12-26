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

class AuthorsBooks extends ActiveRecord
{
    use Traits\MagicSet, Traits\MagicGet, Traits\MagicIsSet;
    use Traits\GetTableProperties, Traits\SetTableProperties;
    protected static $table_name = 'authors_books';
    protected static $table_fields = ['id','author_id','book_id'];
    protected $data = [];
}
