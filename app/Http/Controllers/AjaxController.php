<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Models\CrmProjectPipeline;
use App\Models\CrmProjectItems;
use App\Models\CrmClient;
use App\Models\CrmProjects;

class AjaxController extends Controller
{
    protected $respon;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        /**
         * [$this->respon description]
         * @var [type]
         */
        $this->respon = ['message' => 'error'];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($request->ajax())
        {

        }   
        
        return response()->json($params);
    }

    /**
     * Get Invoice Perpetual License
     * @param  Request $request
     * @return json
     */
    public function getInvoicePerpetualLicense(Request $request)
    {
        $params     = [];
        $update     = [];
        if($request->ajax())
        {
            $params['data']     = CrmProjects::where('id', $request->id)->first();
            $items = [];
            foreach($params['data']->perpetualLicense as $k => $i)
            {
                $items[$k] = $i;
                $items[$k]['invoice_number'] = $i->id.'/'. $request->id .'/INV/'.date('ymd');
            }
            $params['items']    = $items;
        }   
        
        return response()->json($params);
    }

    /**
     * Get Company
     * @param  Request $request
     * @return json
     */
    public function getPipelineHistory(Request $request)
    {
        $params     = [];
        $update     = [];
        if($request->ajax())
        {
            $params['data']     = CrmProjectItems::where('crm_project_id', $request->id)->where('status', $request->status)->get();
            $temp_update   = CrmProjectPipeline::where('crm_project_id', $request->id)->where('pipeline_status', $request->status)->get();

            foreach($temp_update as $key => $item)
            {
                $update[$key]               = $item;
                $update[$key]['user']       = $item->user;
                $update[$key]['url_file']   = asset('storage/projects/'. $item->crm_project_id .'/'. $item->file); 
            }

            $params['update'] = $update;
        }   
        
        return response()->json($params);
    }

    /**
     * Get Pipeline History
     * @param  Request $request
     * @return json
     */
    public function getCompany(Request $request)
    {
        $params     = [];
        if($request->ajax())
        {
            $params['data']     = CrmClient::where('id', $request->id)->first();
        }   
        
        return response()->json($params);
    }
}
