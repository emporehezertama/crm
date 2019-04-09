<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class UsersController extends Controller
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
        $params['data'] = Users::paginate(50);

        return view('admin.users.index')->with($params);
    }

    /**
     * Create Product
     * @return view
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store Product
     * @param  Request $request
     * @return view
     */
    public function store(Request $request)
    {
        $data                           = new Users();
        $data->name                     = $request->name;
        $data->email                    = $request->email;
        $data->user_access_id           = $request->user_access_id;
        $data->status                   = $request->status;
        $data->password                 = bcrypt($request->password);
        $data->save();

        return redirect()->route('admin.users.index')->with('message-success', 'Product saved.');
    }

    /**
     * Update Product
     * @param  $id
     * @return view
     */
    public function edit($id)
    {   
        $params['data'] = Users::where('id', $id)->first();

        return view('admin.users.edit')->with($params);
    }

    /**
     * Update User
     * @param  Request $request
     */
    public function update(Request $request, $id)
    {
        $data                           = Users::where('id', $id)->first();

        if(!empty($data->password))
        {
            $data->password                 = bcrypt($request->password);
        }

        $data->name                     = $request->name;
        $data->email                    = $request->email;
        $data->user_access_id           = $request->user_access_id;
        $data->status                   = $request->status;
        $data->save();

        return redirect()->route('admin.users.index')->with('message-success', 'Product saved.');
    }

     /**
     * Hapus Data
     * @return redirect
     */
    public function destroy($id)
    {
        $data = Users::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.users.index')->with('message-success', 'Deleted');
    }
}