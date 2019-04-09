<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavigationPages extends Model
{
    protected $table = 'navigation_pages';

    /**
     * Navigation
     * @return object
     */
    public function navigation()
    {
    	return $this->hasOne('App\Models\Navigations', 'id', 'navigation_id');
    }
}