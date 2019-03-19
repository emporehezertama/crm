<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\CrmProjects;
use App\Models\CrmProjectPipeline;
use App\Models\CrmProjectItems;

class PipelineController extends Controller
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
        $params['seed']             = CrmProjects::where('pipeline_status', 1)->orderBy('updated_at', 'DESC')->get();
        $params['quotation']        = CrmProjects::where('pipeline_status', 2)->orderBy('updated_at', 'DESC')->get();
        $params['negotiation']      = CrmProjects::where('pipeline_status', 3)->orderBy('updated_at', 'DESC')->get();
        $params['po']               = CrmProjects::where('pipeline_status', 4)->orderBy('updated_at', 'DESC')->get();
        $params['cr']               = CrmProjects::where('pipeline_status', 5)->orderBy('updated_at', 'DESC')->get();

        return view('pipeline.index')->with($params);
    }

    /**
     * Create
     * @return view
     */
    public function create()
    {
        return view('pipeline.create');
    }

    /**
     * Move To Change Request
     * @return 
     */
    public function moveToChangeRequest($id)
    {
        $project = CrmProjects::where('id', $id)->first();
        $project->pipeline_status = 5;
        $project->save();

        return redirect()->route('pipeline.index');
    }

    /**
     * Move To Quotation
     * @return 
     */
    public function moveToQuotation($id, Request $request)
    {
        $project                    = CrmProjects::where('id', $id)->first();
        $project->pipeline_status   = 2;
        $project->quotation_order   = $request->quotation_order;
        $project->price             = replace_idr($request->price);

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $destinationPath = public_path('/storage/projects/'. $project->id);
            $file->move($destinationPath, $fileName);

           $project->file = $fileName;
        }

        $project->save();

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $project->id;
        $item->status               = 2;
        $item->item                 = 'quotation_order';
        $item->value                = $request->quotation_order;
        $item->save(); 

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $project->id;
        $item->status               = 2;
        $item->item                 = 'submit_date';
        $item->value                = $request->submit_date;
        $item->save(); 

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $project->id;
        $item->status               = 2;
        $item->item                 = 'price';
        $item->value                = replace_idr($request->price);
        $item->save(); 

        if (isset($fileName))
        {
            $item                       = new CrmProjectItems();
            $item->crm_project_id       = $project->id;
            $item->status               = 2;
            $item->item                 = 'file';
            $item->value                = $fileName;
            $item->save();
        }

        return redirect()->route('pipeline.index');
    }

    /**
     * Move To Negotation
     * @return 
     */
    public function moveToNegotation($id, Request $request)
    {
        $project = CrmProjects::where('id', $id)->first();
        $project->pipeline_status = 3;
        $project->price             = replace_idr($request->price);

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $destinationPath = public_path('/storage/projects/'. $project->id);
            $file->move($destinationPath, $fileName);

           $project->file = $fileName;
        }

        $project->save();

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $project->id;
        $item->status               = 3;
        $item->item                 = 'negotation_order';
        $item->value                = $request->negotation_order;
        $item->save(); 

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $project->id;
        $item->status               = 3;
        $item->item                 = 'submit_date';
        $item->value                = $request->submit_date;
        $item->save(); 

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $project->id;
        $item->status               = 3;
        $item->item                 = 'price';
        $item->value                = replace_idr($request->price);
        $item->save(); 

        if (isset($fileName))
        {
            $item                       = new CrmProjectItems();
            $item->crm_project_id       = $project->id;
            $item->status               = 3;
            $item->item                 = 'file';
            $item->value                = $fileName;
            $item->save();
        }

        return redirect()->route('pipeline.index');
    }

    /**
     * Move To Quotation
     * @return 
     */
    public function moveToPO($id, Request $request)
    {
        $project = CrmProjects::where('id', $id)->first();
        $project->pipeline_status = 4;
        $project->save();

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $project->id;
        $item->status               = 4;
        $item->item                 = 'po_number';
        $item->value                = $request->po_number;
        $item->save(); 

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $project->id;
        $item->status               = 4;
        $item->item                 = 'price';
        $item->value                = replace_idr($request->price);
        $item->save();

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $project->id;
        $item->status               = 4;
        $item->item                 = 'payment_method';
        $item->value                = $request->payment_method;
        $item->save();

        if($request->payment_method == 1)
        {
            $item                       = new CrmProjectItems();
            $item->crm_project_id       = $project->id;
            $item->status               = 4;
            $item->item                 = 'month';
            $item->value                = $request->month;
            $item->save();

            $item                       = new CrmProjectItems();
            $item->crm_project_id       = $project->id;
            $item->status               = 4;
            $item->item                 = 'start_date';
            $item->value                = $request->start_date;
            $item->save();

            $item                       = new CrmProjectItems();
            $item->crm_project_id       = $project->id;
            $item->status               = 4;
            $item->item                 = 'end_date';
            $item->value                = $request->end_date;
            $item->save();
        }

        if($request->payment_method == 2)
        {
            $item                       = new CrmProjectItems();
            $item->crm_project_id       = $project->id;
            $item->status               = 4;
            $item->item                 = 'year';
            $item->value                = $request->year;
            $item->save();
        }

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $destinationPath = public_path('/storage/projects/'. $project->id);
            $file->move($destinationPath, $fileName);

            $item                       = new CrmProjectItems();
            $item->crm_project_id       = $project->id;
            $item->status               = 2;
            $item->item                 = 'file';
            $item->value                = $fileName;
            $item->save();
        }

        return redirect()->route('pipeline.index');
    }

    /**
     * Add Notes
     * @param  $id
     * @return 
     */
    public function addNote($id, Request $request)
    {
        $project = CrmProjects::where('id', $id)->first();

        $data                       = new CrmProjectPipeline();
        $data->user_id              = \Auth::user()->id;
        $data->crm_project_id       = $id;
        $data->status_card          = 5;
        $data->pipeline_status      = $project->pipeline_status; 
        $data->value                = $request->note;
        $data->title                = $request->title;

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $destinationPath = public_path('/storage/projects/'. $project->id);
            $file->move($destinationPath, $fileName);

            $data->file = $fileName;
        }

        $data->save();

        return redirect()->route('pipeline.index');
    }

    /**
     * Store database Card
     * @return void
     */
    public function store(Request $request)
    {
        $data                       = new CrmProjects();
        $data->crm_client_id        = $request->crm_client_id;
        $data->price                = replace_idr($request->price);
        $data->description          = $request->description; 
        $data->color                = $request->color; 
        $data->pipeline_status      = $request->pipeline_status;
        $data->name                 = $request->name;
        $data->project_category     = $request->project_category;
        $data->sales_id             = \Auth::user()->id;

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $destinationPath = public_path('/storage/projects/'. $data->id);
            $file->move($destinationPath, $fileName);

            $data->file = $fileName;
        }
        $data->save();

        $item                       = new CrmProjectItems();
        $item->crm_project_id       = $data->id;
        $item->status               = 1;
        $item->item                 = 'price';
        $item->value                = replace_idr($request->price);
        $item->save();

        if(isset($fileName))
        {
            $item                       = new CrmProjectItems();
            $item->crm_project_id       = $data->id;
            $item->status               = 1;
            $item->item                 = 'file';
            $item->value                = $fileName;
            $item->save();
        }

        return redirect()->route('pipeline.index')->with('message-success', 'Card created');
    }

    /**
     * Calls
     * @return void
     */
    public function calls($id)
    {
        $project = CrmProjects::where('id', $id)->first();

        $data                       = new CrmProjectPipeline();
        $data->user_id              = \Auth::user()->id;
        $data->crm_project_id       = $id;
        $data->status_card          = 1;
        $data->pipeline_status      = $project->pipeline_status; 
        $data->value                = 'Calls';
        $data->save();

        return redirect()->route('pipeline.index');
    }

    /**
     * Reminder
     * @param 
     */
    public function reminder($id)
    {
        $project = CrmProjects::where('id', $id)->first();

        $data                       = new CrmProjectPipeline();
        $data->user_id              = \Auth::user()->id;
        $data->crm_project_id       = $id;
        $data->status_card          = 2;
        $data->pipeline_status      = $project->pipeline_status; 
        $data->value                = 'Reminder';
        $data->save();

        return redirect()->route('pipeline.index');
    }

     /**
     * Reminder
     * @param 
     */
    public function demo($id)
    {
        $project = CrmProjects::where('id', $id)->first();

        $data                       = new CrmProjectPipeline();
        $data->user_id              = \Auth::user()->id;
        $data->crm_project_id       = $id;
        $data->status_card          = 3;
        $data->pipeline_status      = $project->pipeline_status; 
        $data->value                = 'Demo';
        $data->save();

        return redirect()->route('pipeline.index');
    }

    /**
     * Reminder
     * @param 
     */
    public function terminate($id)
    {
        $project = CrmProjects::where('id', $id)->first();

        $data                       = new CrmProjectPipeline();
        $data->user_id              = \Auth::user()->id;
        $data->crm_project_id       = $id;
        $data->status_card          = 4;
        $data->pipeline_status      = $project->pipeline_status; 
        $data->value                = 'Terminate';
        $data->save();

        return redirect()->route('pipeline.index');
    }

     /**
     * Reminder
     * @param 
     */
    public function edit($id)
    {
        $project = CrmProjects::where('id', $id)->first();

        return view('project.edit')->with(['data' => $project]);
    }
}