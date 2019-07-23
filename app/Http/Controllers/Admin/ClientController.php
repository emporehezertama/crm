<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CrmClient;
use App\Models\Users;
use App\Http\Controllers\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Imports\ClientImport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

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
        $client->status                 = $request->status;

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
        $client->status                 = $request->status;

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


    public function importClient(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        if($request->hasFile('file'))
        {
            
        /*  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($request->file);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = [];
            foreach ($worksheet->getRowIterator() AS $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                $cells = [];
                foreach ($cellIterator as $cell) {
                    $cells[] = $cell->getValue();
                }
                $rows[] = $cells;
            }

            foreach($rows as $key => $row)
            {
                $count_row = 5;
                if($key ==0) continue;
                
                $fullname           = $row[0];
                $email              = $row[1];
                $jabatan            = $row[2];
                $bidang_usaha       = $row[3];
                $nama_perusahaan    = $row[4];
                $handphone          = $row[5];

                $user                           = new Users();
                $user->name                     = $nama_perusahaan;
                $user->email                    = $email;
                $user->save();

                $client                         = new CrmClient();
                $client->name                   = $nama_perusahaan;
                $client->handphone              = $handphone;
                $client->email                  = $email;
                $client->pic_name               = $fullname;
                $client->pic_email              = $email;
                $client->pic_telepon            = $handphone;
                $client->save();
            }   */

            
     
            // menangkap file excel
            $file = $request->file('file');
     
            // membuat nama file unik
            $nama_file = rand().$file->getClientOriginalName();
     
            // upload ke folder file_siswa di dalam folder public
            $file->move('storage',$nama_file);
     
            // import data
            Excel::import(new ClientImport, public_path('/storage/'.$nama_file));
            Excel::import(new UsersImport, public_path('/storage/'.$nama_file));
     
            
            return redirect()->route('client.index')->with('message-success', 'Client saved.');
        }
    }
}