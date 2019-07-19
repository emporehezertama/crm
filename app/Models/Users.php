<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = ['name','email','email_verified_at', 'password', 'remember_token', 'user_access_id', 'status', 
                            'foto', 'address', 'telepon', 'fax'];


    /**
     * Relation table user_access
     * @return object
     */
    protected function access()
    {
    	return $this->hasOne('App\Models\UserAccess', 'id', 'user_access_id');
    }
}
