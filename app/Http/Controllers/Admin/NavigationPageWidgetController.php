<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NavigationPageWidget;

class NavigationPageWidgetController extends Controller
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
        $params['data'] = NavigationPageWidget::paginate(50);

        return view('admin.navigation-page-widget.index')->with($params);
    }

    /**
     * Create Product
     * @return view
     */
    public function create()
    {
        return view('admin.navigation-page-widget.create');
    }

    /**
     * Store Product
     * @param  Request $request
     * @return view
     */ 
    public function store(Request $request) 
    {
        $data                       = new NavigationPageWidget();
        $data->navigation_id        = $request->navigation_id;
        $data->title                = $request->title;
        $data->description          = $request->description;
        $data->order                = $request->order;
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $destinationPath = public_path('/upload/widget/');
            $file->move($destinationPath, $fileName);   
            $data->image = '/upload/widget/'.$fileName;
        }
        $data->save();

        return redirect()->route('admin.navigation-page-widget.index')->with('message-success', 'Widget saved.');
    }

    /**
     * Update
     * @param  Request $request
     * @return redirect
     */
    public function update($id, Request $request)
    {
        $data                       = NavigationPageWidget::where('id', $id)->first();
        $data->navigation_id        = $request->navigation_id;
        $data->title                = $request->title;
        $data->description          = $request->description;
        $data->order                = $request->order;
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $destinationPath = public_path('/upload/widget/');
            $file->move($destinationPath, $fileName);   
            $data->image = '/upload/widget/'.$fileName;
        }
        $data->save();

        return redirect()->route('admin.navigation-page-widget.index')->with('message-success', 'Widget saved.');
    }

    /**
     * Update Product
     * @param  $id
     * @return view
     */
    public function edit($id)
    {   
        $params['data'] = NavigationPageWidget::where('id', $id)->first();

        return view('admin.navigation-page-widget.edit')->with($params);
    }

     /**
     * Hapus Data
     * @return redirect
     */
    public function destroy($id)
    {
        $data = NavigationPageWidget::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.navigation-page-widget.index')->with('message-success', 'Deleted');
    }
}