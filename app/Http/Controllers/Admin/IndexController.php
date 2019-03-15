<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class IndexController extends Controller
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
        return view('admin.index');
    }

    /**
     * Profile
     * @return view
     */
    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * Profile Update
     * @param  Request $request
     * @return redirect
     */
    public function profileUpdate(Request $request)
    {
        $user = Users::where('id', \Auth::user()->id)->first();
        if($request->user)
        {
            foreach($request->user as $key => $value)
            {
                $user->$key = $value;
            }
        }

        if ($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

            $destinationPath = public_path('/upload/profile/'. \Auth::user()->id);
            $file->move($destinationPath, $fileName);

            $user->foto = '/upload/profile/'. \Auth::user()->id .'/'. $fileName;
        }

        $user->save();

        return redirect()->route('admin.profile')->with('message-success', 'Profile saved');
    }

    /**
     * Change Password
     * @return redirect
     */
    public function changePassword(Request $request)
    {
        $data = Users::where('id', \Auth::user()->id)->first();
        
        if($request->password != $request->confirmation)
        {
            return redirect()->route('admin.profile')->with('message-error', 'The Confirmation password wrong');
        }
        if(!empty($request->password))
        {
            $this->validate($request,[
                'confirmation'      => 'same:password',
            ]);

            $data->password             = bcrypt($request->password);
        }

        $data->save();

        return redirect()->route('admin.profile')->with('message-success', 'Password updated');
    }   
}