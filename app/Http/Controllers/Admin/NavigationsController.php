<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Navigations;

class NavigationsController extends Controller
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
        $params['data'] = Navigations::paginate(50);

        return view('admin.navigations.index')->with($params);
    }

    /**
     * Create Product
     * @return view
     */
    public function create()
    {
        return view('admin.navigations.create');
    }

    /**
     * Store Product
     * @param  Request $request
     * @return view
     */
    public function store(Request $request)
    {
        $data                               = new Navigations();
        $data->parent_navigation_id         = $request->parent_navigation_id;
        $data->title                        = $request->title;
        $data->permalink                    = $request->permalink;
        $data->hash_url                     = $request->hash_url;
        $data->description                  = $request->description;
        $data->order                        = $request->order;
        $data->status                       = $request->status;
        $data->position_top_menu            = $request->position_top_menu;
        $data->position_main_menu           = $request->position_main_menu;
        $data->position_footer_menu         = $request->position_footer_menu;
        $data->save();

        return redirect()->route('admin.navigations.index')->with('message-success', 'Navigation saved.');
    }

    /**
     * Update
     * @param  Request $request
     * @return redirect
     */
    public function update($id, Request $request)
    {
        $data                               = Navigations::where('id', $id)->first();
        $data->parent_navigation_id         = $request->parent_navigation_id;
        $data->title                        = $request->title;
        $data->permalink                    = $request->permalink;
        $data->hash_url                     = $request->hash_url;
        $data->description                  = $request->description;
        $data->order                        = $request->order;
        $data->status                       = $request->status;
        $data->position_top_menu            = $request->position_top_menu;
        $data->position_main_menu           = $request->position_main_menu;
        $data->position_footer_menu         = $request->position_footer_menu;
        $data->save();

        return redirect()->route('admin.navigations.index')->with('message-success', 'Navigation saved.');
    }

    /**
     * Update Product
     * @param  $id
     * @return view
     */
    public function edit($id)
    {   
        $params['data'] = Navigations::where('id', $id)->first();

        return view('admin.navigations.edit')->with($params);
    }

     /**
     * Hapus Data
     * @return redirect
     */
    public function destroy($id)
    {
        $data = Navigations::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.navigations.index')->with('message-success', 'Deleted');
    }
}