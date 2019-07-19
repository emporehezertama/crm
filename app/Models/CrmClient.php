<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmClient extends Model
{
    protected $table = 'crm_client';

    protected $fillable = ['name','handphone','fax', 'address', 'email', 'type_customer', 'company', 'sales_id', 
                            'foto', 'user_id', 'pic_name', 'pic_telepon', 'pic_email', 'pic_position', 'status'];

    /**
     * Relation to Sales
     * @return object
     */
   	public function sales()
   	{
   		return $this->hasOne('App\User', 'id', 'sales_id');
   	}
}
