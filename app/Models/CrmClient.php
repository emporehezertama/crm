<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmClient extends Model
{
    protected $table = 'crm_client';

    /**
     * Relation to Sales
     * @return object
     */
   	public function sales()
   	{
   		return $this->hasOne('App\User', 'id', 'sales_id');
   	}
}
