<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\CrmPriceList;
use App\Models\CrmProduct;
use App\Models\CrmPriceListHistory;
use App\Models\CrmPriceListHistoryDetail;
use DB;

class PriceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $params['data'] = CrmPriceListHistory::get();
        return view('price.index')->with($params);
    }

    /**
     * Print Invoice
     * @param  $id
     * @return pdf
     */
    

    public function create()
    {
        if(CrmPriceListHistory::count() < 1){
            $params['data'] = CrmProduct::whereNotNull('price_id')
                                            ->orderBy('price_id')
                                            ->get();
        }else{
            $lasthistoryid = CrmPriceListHistoryDetail::latest('history_id')->first();
            $params['data'] = DB::table('crm_pricelist_history_detail')
                                    ->select('crm_pricelist_history_detail.price as modul_price', 'crm_product.name', 'crm_product.price_id')
                                    ->join('crm_product', 'crm_pricelist_history_detail.price_id', '=', 'crm_product.price_id')
                                    ->where('crm_pricelist_history_detail.history_id', $lasthistoryid->history_id)
                                    ->orderBy('crm_pricelist_history_detail.price_id')
                                    ->get();
        }
        return view('price.create')->with($params);
    }

    /**
     * Move To Change Request
     * @return 
     */
    

    /**
     * Add Notes
     * @param  $id
     * @return 
     */
   
    /**
     * Store database Card
     * @return void
     */
    public function store(Request $request)
    {

        $id = $request->input('id');

        if(CrmPriceListHistory::count() < 1){
            $historyid = 1;
        }else{
            $getid = CrmPriceListHistory::latest('id')->first();
            $historyid = $getid->id + 1;
        }

        $data               = new CrmPriceListHistory();
        $data->id           = $historyid;
        $data->save();

        foreach($id as $key => $item){
            $data                       = new CrmPriceListHistoryDetail();
            $data->price_id             = $id[$key];
            $data->history_id           = $historyid;
            $data->price                = $request->price[$key];
            $data->save();
        }
        
        return redirect()->route('price.index')->with('message-success', 'Price Successfully Saved');
    }

    /**
     * Calls
     * @return void
     */
    
     /**
     * Reminder
     * @param 
     */
    public function edit($id)
    {
        $params['data'] = DB::table('crm_pricelist_history_detail')
                                    ->select('crm_pricelist_history_detail.price', 'crm_product.name', 'crm_product.price_id')
                                    ->join('crm_product', 'crm_pricelist_history_detail.price_id', '=', 'crm_product.price_id')
                                    ->where('crm_pricelist_history_detail.history_id', $id)
                                    ->orderBy('crm_pricelist_history_detail.price_id')
                                    ->get();
    //    dd($params);
        return view('price.edit')->with($params);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        foreach($id as $key => $item){
            $data                       = CrmPriceListHistoryDetail::where('history_id');
            $data->price_id             = $id[$key];
            $data->history_id           = $historyid;
            $data->price                = $request->price[$key];
            $data->save();
        }
        return view('price.update')->with(['data' => $project]);
    }

    /**
     * Delete
     * @return void
     */
    public function destroy ($id)
    {
        $data   = CrmPricelistHistory::where('id', $id)->first();
        $data->delete();

        $data   = CrmPricelistHistoryDetail::where('history_id', $id)->first();
        $data->delete();

        return redirect()->route('price.index');
    }   

/*    public function editNewPricelist ()
    {
        if(CrmPriceListHistory::count() < 1){
            $params['data'] = CrmProduct::whereNotNull('price_id')
                                            ->orderBy('price_id')
                                            ->get();
        }else{
            $lasthistoryid = CrmPriceListHistoryDetail::latest('history_id')->first();
            $params['data'] = DB::table('crm_pricelist_history_detail')
                                    ->select('crm_pricelist_history_detail.price as modul_price', 'crm_product.name', 'crm_product.price_id')
                                    ->join('crm_product', 'crm_pricelist_history_detail.price_id', '=', 'crm_product.price_id')
                                    ->where('crm_pricelist_history_detail.history_id', $lasthistoryid->history_id)
                                    ->orderBy('crm_pricelist_history_detail.price_id')
                                    ->get();
        }
        return view('price.create1')->with($params);
    }

    public function updateNewPricelist (Request $request)
    {
        $id = $request->input('id');

        if(CrmPriceListHistory::count() < 1){
            $historyid = 1;
        }else{
            $getid = CrmPriceListHistory::latest('id')->first();
            $historyid = $getid->id + 1;
        }

        $data               = new CrmPriceListHistory();
        $data->id           = $historyid;
        $data->save();

        foreach($id as $key => $item){
            $data                       = new CrmPriceListHistoryDetail();
            $data->price_id             = $id[$key];
            $data->history_id           = $historyid;
            $data->price                = $request->price[$key];
            $data->save();
        }
        
        return redirect()->route('price.index')->with('message-success', 'Price Successfully Saved');
    }   */
}