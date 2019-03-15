<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CrmProjects;

class ProjectController extends Controller
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
        $params['data'] = CrmProjects::paginate(100);

        return view('sales.project.index')->with($params);
    }
}
