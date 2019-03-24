<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmProjectInvoice extends Model
{
    protected $table = 'crm_project_invoice';

    /**
     * Relation to crm_projects
     * @return void
     */
    public function project()
    {
    	return $this->hasOne('\App\Models\CrmProjects', 'id', 'crm_project_id');
    }
}