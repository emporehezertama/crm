<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectProduct extends Model
{
    //
    protected $table = 'project_product';

    public function productName()
    {
      return $this->hasOne('App\Models\CrmProduct','id','crm_product_id');
    }
}
