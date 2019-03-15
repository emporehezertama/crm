<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    /**
     * Relation table user_access
     * @return object
     */
    protected function access()
    {
    	return $this->hasOne('App\Models\UserAccess', 'id', 'user_access_id');
    }
}
