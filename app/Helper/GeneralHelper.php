<?php 

/**
 * Get Payment Method
 * @param  $id
 * @return void
 */
function get_crm_payment_method($id)
{
	$arr = [ 1=>'Perpetual License', 2=>'Subscription'];

	return @$arr[$id];
}

/**
 * Get Crm Project Item
 * @param  $object
 */
function get_crm_project_item($object, $key)
{
	$item = \App\Models\CrmProjectItems::where('crm_project_id', $object->id)->where('status', $object->pipeline_status)->where('item', $key)->first();

	if($item)
	{
		return $item->value;
	}
}

/**
 * Count Data
 * @return number
 */
function count_($data, $count_row=false)
{
	$number = 0;
	foreach($data as $item)
	{
		$number += $item->price;
	}

	if($count_row)
	{
		$number = 0;
		foreach($data as $item)
		{
			$number++;
		}		

		return $number;
	}

	return $number;
}

/**
 * Status Pipeline
 * @return object
 */
function status_pipeline_card($item)
{
	$html = '';
    if($item->status_card == 1)
    {
       $html = '<div class="bs-callout-success callout-border-left mt-0 p-1">
			        <span class="alert-icon">
			          <i class="ft-phone"></i>
			        </span>
			        '. $item->value .'
			        <small class="float-right">'. date('d/m/Y', strtotime($item->created_at)) .'</small>
			      </div>';
    }

    if($item->status_card == 2)
    {
      $html = '<div class="bs-callout-primary callout-border-left p-1 mb-0" role="alert">
			        <span class="alert-icon">
			          <i class="ft-mail"></i>
			        </span>
			        '. $item->value .'
			        <small class="float-right">'. date('d/m/Y', strtotime($item->created_at)) .'</small>
			      </div>';
    }

    if($item->status_card == 3)
    {
      	$html ='<div class="bs-callout-danger callout-border-left p-1 mb-0" role="alert">
			        <span class="alert-icon">
			          <i class="ft-play"></i>
			        </span>
			        '. $item->value .'
			        <small class="float-right">'. date('d/m/Y', strtotime($item->created_at)) .'</small>
			      </div>';
	}
    
    if($item->status_card == 4)
    {
      	$html = '<div class="bs-callout-pink callout-border-left p-1 mb-0" role="alert">
			        <span class="alert-icon">
			          <i class="ft-trash-2"></i>
			        </span>
			        '. $item->value .'
			        <div class="clearfix"></div><small class="float-left" style="font-size: 70%;">'. date('d M Y', strtotime($item->created_at)) .'</small>
			      </div>';
    }

    if($item->status_card == 5)
    {
       	$html = '<div class="mt-0 p-1" style="border-bottom: 1px solid #e4e7ed;">

       				<strong>'. $item->title .'</strong><br />
			        '. $item->value;

		if(!empty($item->file))
		{
			$html .= '<br /><a href="'. asset('storage/projects/'. $item->crm_project_id .'/'. $item->file) .'" target="_blank">'. $item->file .'</a>';
		}
		
		$html .='<div class="clearfix"></div>
					<small class="float-left" style="font-size: 70%;">'. date('d M Y', strtotime($item->created_at)) .'</small>
					<small class="float-right">'. $item->user->name .'</small>
			    </div>';
    }

    return $html;
}

/**
 * Pipeline status
 * @return arrays
 */
function list_pipeline_status()
{
	return [1 => 'Seed', 2 => 'Quotation', 3 => 'Negotiation', 4 => 'PO / Contract', 5 => 'Change Request'];
}

/**
 * Replace IDR
 * @return string
 */
function replace_idr($nominal)
{
	if($nominal == "") return 0;
	
	$nominal = str_replace('Rp. ','', $nominal);
    $nominal = str_replace('.', '', $nominal);
    $nominal = str_replace(',', '', $nominal);

    return $nominal;
}

/**
 * List Client
 * @return object
 */
function list_product()
{
	return [1 => 'HRIS', 2 => 'Asset Management'];
}

/**
 * List Client
 * @return object
 */
function list_client()
{
	return \App\Models\CrmClient::get();
}

/**
 * List Sales
 * @return object
 */
function list_sales()
{
	return \App\User::where('user_access_id', 4)->get();
}

/**
 * Get Setting
 * @return string
 */
function get_setting($key)
{
	$setting = \App\Models\Setting::where('key', $key)->first();
	if($setting)
	{
		return $setting->value;
	}

	return "";
}

/**
 * Custome number_format
 * @return number
 */
function number_format2($number)
{
	return number_format($number,0,0,'.');
}
