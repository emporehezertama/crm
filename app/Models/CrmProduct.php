<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmProduct extends Model
{
    protected $table = 'crm_product';

    public function child()
   	{
   		return $this->hasMany('App\Models\CrmProduct', 'parent_id', 'id');
   	}
}
