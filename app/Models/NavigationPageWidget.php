<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavigationPageWidget extends Model
{
    protected $table = 'navigation_page_widget';

    /**
     * Navigation
     * @return object
     */
    public function navigation()
    {
    	return $this->hasOne('App\Models\Navigations', 'id', 'navigation_id');
    }
}