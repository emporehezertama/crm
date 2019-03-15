<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmProjects extends Model
{
    protected $table = 'crm_projects';

    /**
     * Relation to Sales
     * @return object
     */
   	public function sales()
   	{
   		return $this->hasOne('App\User', 'id', 'sales_id');
   	}

   	/**
   	 * Crm Client
   	 * @return object
   	 */
   	public function client()
   	{
   		return $this->hasOne('App\Models\CrmClient', 'id', 'crm_client_id');
   	}

    /**
     * Project Pipeline
     * @return objects
     */
    public function projectPipeline()
    {
      return $this->hasMany('App\Models\CrmProjectPipeline', 'crm_project_id', 'id')->orderBy('id', 'DESC');
    }
}