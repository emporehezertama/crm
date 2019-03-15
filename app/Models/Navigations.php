<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigations extends Model
{
    protected $table  = 'navigations';

    /**
     * Relation Page
     * @return object
     */
    public function page()
    {
    	return $this->hasOne('\App\Models\NavigationPages', 'navigation_id', 'id');
    }
}
