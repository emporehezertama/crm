<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CrmProduct;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $params['data'] = CrmProduct::whereNull('parent_id')->paginate(50);

        return view('admin.product.index')->with($params);
    }

    /**
     * Create Product
     * @return view
     */
    public function create()
    {
        return view('admin.product.create');
    }
    /**
     * Store Product
     * @param  Request $request
     * @return view
     */
    public function store(Request $request)
    {
        $data               = new CrmProduct();
        $data->parent_id    = $request->parent_id;
        $data->name         = $request->name;
        $data->user_limit   = isset($request->user_limit) ? 1 : 0;
        $data->description  = $request->description;
        $data->save();

        return redirect()->route('admin.product.index')->with('message-success', 'Product saved.');
    }

    /**
     * Update Product
     * @param  $id
     * @return view
     */
    public function edit($id)
    {   
        $params['data'] = CrmProduct::where('id', $id)->first();

        return view('admin.product.edit')->with($params);
    }

    /**
     * Update User
     * @param  Request $request
     */
    public function update(Request $request, $id)
    {
        $data               = CrmProduct::where('id', $id)->first();
        $data->parent_id    = $request->parent_id;
        $data->name         = $request->name;
        $data->user_limit   = isset($request->user_limit) ? 1 : 0;
        $data->description  = $request->description;

        $data->save();

        return redirect()->route('admin.product.index')->with('message-success', 'Product saved.');
    }

     /**
     * Hapus Data
     * @return redirect
     */
    public function destroy($id)
    {
        $data = CrmProduct::where('id', $id)->first();
        $data->delete();

        $child = CrmProduct::where('parent_id', $id)->delete();

        return redirect()->route('admin.product.index')->with('message-success', 'Deleted');
    }
}