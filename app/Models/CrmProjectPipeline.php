<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmProjectPipeline extends Model
{
    protected $table = 'crm_project_pipeline';

     /**
     * Relation to Sales
     * @return object
     */
   	public function user()
   	{
   		return $this->hasOne('App\User', 'id', 'user_id');
   	}
}
