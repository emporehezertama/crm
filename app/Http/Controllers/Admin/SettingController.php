<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
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
        return view('admin.setting.index');
    }

   
    /**
     * Update Product
     * @param  $id
     * @return view
     */
    public function update(Request $request)
    {   
        if($request->setting)
        {
            foreach($request->setting as $key => $value)
            {
                $setting = Setting::where('key', $key)->first();
                if(!$setting)
                {
                    $setting = new Setting();
                    $setting->key = $key;
                }
                $setting->value = $value;
                $setting->save();
            }
        }

        if ($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

            $destinationPath = public_path('/upload/setting');
            $file->move($destinationPath, $fileName);

            $setting = Setting::where('key', 'logo')->first();
            if(!$setting)
            {
                $setting = new Setting();
                $setting->key = 'logo';
            }
            $setting->value = $fileName;
            $setting->save();
        }

        if ($request->hasFile('favicon'))
        {
            $file = $request->file('favicon');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

            $destinationPath = public_path('/upload/setting');
            $file->move($destinationPath, $fileName);

            $setting = Setting::where('key', 'favicon')->first();
            if(!$setting)
            {
                $setting = new Setting();
                $setting->key = 'favicon';
            }
            $setting->value = $fileName;
            $setting->save();
        }

        if ($request->hasFile('logo_footer'))
        {
            $file = $request->file('logo_footer');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

            $destinationPath = public_path('/upload/setting');
            $file->move($destinationPath, $fileName);

            $setting = Setting::where('key', 'logo_footer')->first();
            if(!$setting)
            {
                $setting = new Setting();
                $setting->key = 'logo_footer';
            }
            $setting->value = $fileName;
            $setting->save();
        }

        return redirect()->route('admin.setting.index')->with('message-success', 'Setting Saved');
    }
}