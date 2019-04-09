<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CrmClient;
use App\Models\Users;
use App\Http\Controllers\Controller;

class ClientController extends Controller
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
     * Show the application client.
     *
     * @return view
     */
    public function index()
    {
        if(\Auth::user()->user_access_id == 1)
        {
            $data = CrmClient::paginate(50);
        }
        else
        {
            $data = CrmClient::where('sales_id', \Auth::user()->id)->paginate(50);
        }

        $params['data'] = $data;
        
        return view('sales.client.index')->with($params);
    }

    /**
     * Create
     * @return view
     */
    public function create()
    {
        return view('sales.client.create');
    }

    /**
     * Store
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        $data                           = new Users();
        $data->name                     = $request->name;
        $data->password                 = bcrypt($request->password);
        $data->email                    = $request->email;
        $data->save();

        $client                         = new CrmClient();
        $client->name                   = $request->name;
        $client->handphone              = $request->handphone;
        $client->fax                    = $request->fax;
        $client->email                  = $request->email;
        $client->address                = $request->address;
        $client->sales_id               = $request->sales_id;
        $client->user_id                = $data->id;
        $client->pic_name               = $request->pic_name;
        $client->pic_email              = $request->pic_email;
        $client->pic_telepon            = $request->pic_telepon;

        if ($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

            $destinationPath = public_path('/storage/client/'. $client->id);
            $file->move($destinationPath, $fileName);

            $client->foto = '/storage/client/'. $client->id .'/'. $fileName;
        }
        $client->save();

        return redirect()->route('sales.client.index')->with('message-success', 'Client saved.');
    }

    /**
     * Edit 
     * @param  $id
     */
    public function edit($id)
    {
        $params['data'] = CrmClient::where('id', $id)->first();

        return view('sales.client.edit')->with($params);
    }

    /**
     * Store
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        $client                         = CrmClient::where('id', $id)->first();
        $client->name                   = $request->name;
        $client->handphone              = $request->handphone;
        $client->fax                    = $request->fax;
        $client->email                  = $request->email;
        $client->address                = $request->address;
        $client->sales_id               = $request->sales_id;
        $client->pic_name               = $request->pic_name;
        $client->pic_email              = $request->pic_email;
        $client->pic_telepon            = $request->pic_telepon;

        if ($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

            $destinationPath = public_path('/storage/client/'. $client->id);
            $file->move($destinationPath, $fileName);

            $client->foto = '/storage/client/'. $client->id .'/'. $fileName;
        }

        $client->save();

        $data                           = Users::where('id', $client->user_id)->first();
        if($data)
        {
            $data->name                     = $request->name;
            $data->email                    = $request->email;

            if(!empty($request->password))
            {
                $data->password                 = bcrypt($request->password);
            }
            $data->save();
        }

        return redirect()->route('sales.client.index')->with('message-success', 'Client saved.');
    }

    /**
     * Hapus Data
     * @return redirect
     */
    public function destroy($id)
    {
        $data = CrmClient::where('id', $id)->first();
        $data->delete();

        return redirect()->route('sales.client.index')->with('message-success', 'Deleted');
    }
}