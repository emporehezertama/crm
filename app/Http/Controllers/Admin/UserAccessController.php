<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAccess;

class UserAccessController extends Controller
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
        $params['data'] = UserAccess::paginate(50);

        return view('admin.user-access.index')->with($params);
    }

    /**
     * Create Product
     * @return view
     */
    public function create()
    {
        return view('admin.user-access.create');
    }

    /**
     * Store Product
     * @param  Request $request
     * @return view
     */
    public function store(Request $request)
    {
        $data                           = new UserAccess();
        $data->name                     = $request->name;
        $data->description              = $request->description;
        $data->save();

        return redirect()->route('admin.user-access.index')->with('message-success', 'User Access saved.');
    }

    /**
     * Update 
     * @param  $id
     * @param  Request $request
     */
    public function update($id, Request $request)
    {
        $data                           = UserAccess::where('id', $id)->first();
        $data->name                     = $request->name;
        $data->description              = $request->description;
        $data->save();

        return redirect()->route('admin.user-access.index')->with('message-success', 'User Access saved.');
    }

    

     /**
     * Hapus Data
     * @return redirect
     */
    public function destroy($id)
    {
        $data = UserAccess::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.user-access.index')->with('message-success', 'Deleted');
    }
}