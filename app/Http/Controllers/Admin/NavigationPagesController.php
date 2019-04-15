<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NavigationPages;

class NavigationPagesController extends Controller
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
        $params['data'] = NavigationPages::paginate(50);

        return view('admin.navigation-pages.index')->with($params);
    }

    /**
     * Create Product
     * @return view
     */
    public function create()
    {
        return view('admin.navigation-pages.create');
    }

    /**
     * Store Product
     * @param  Request $request
     * @return view
     */
    public function store(Request $request)
    {
        $data                               = new NavigationPages();
        $data->navigation_id                = $request->navigation_id;
        $data->title                        = $request->title;
        $data->description                  = $request->description;
        $data->order                        = $request->order;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $destinationPath = public_path('/upload/pages/');
            $file->move($destinationPath, $fileName);   
            $data->image = '/upload/pages/'.$fileName;
        }
        
        $data->save();

        return redirect()->route('admin.navigation-pages.index')->with('message-success', 'Navigation saved.');
    }

    /**
     * Update Product
     * @param  $id
     * @return view
     */
    public function edit($id)
    {   
        $params['data'] = NavigationPages::where('id', $id)->first();

        return view('admin.navigation-pages.edit')->with($params);
    }

    /**
     * Update Pages
     * @param  Request $request
     * @return view
     */
    public function update(Request $request, $id)
    {
        $data                               = NavigationPages::where('id', $id)->first();
        $data->navigation_id                = $request->navigation_id;
        $data->title                        = $request->title;
        $data->description                  = $request->description;
        $data->order                        = $request->order;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $destinationPath = public_path('/upload/pages/');
            $file->move($destinationPath, $fileName);   
            $data->image = '/upload/pages/'.$fileName;
        }

        $data->save();

        return redirect()->route('admin.navigation-pages.index')->with('message-success', 'Navigation saved.');
    }

     /**
     * Hapus Data
     * @return redirect
     */
    public function destroy($id)
    {
        $data = NavigationPages::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.navigation-pages.index')->with('message-success', 'Deleted');
    }
}