@extends('layouts.administrator')

@section('title', 'Pipeline')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Pipeline</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Pipeline</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
      <div class="btn-group">
        <a href="{{ route('pipeline.create') }}" class="btn btn-round btn-info"><i class="ft ft-plus"></i> </a>
      </div>
    </div>
  </div>
  <div class="content-body">
    <div class="row">
      <div class="col-2" style="flex:0 0 20%; max-width: 20%;">
        <div class=" pt-1 pl-0 pr-0" style="position: relative;">
          <h3 class="float-left">Seed </h3>
          <h3 class="float-right">{{ count_($seed, true) }}</h3>
          <label style="bottom: 0;right: 0;position: absolute;">Rp. {{ number_format( count_($seed) ) }}</label>
          <div class="clearfix"></div>
          <div class="progress progress-sm mt-1 mb-0">
            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="clearfix"></div><br />
        @foreach($seed as $item)
        <div class="card mb-0" style="border-left: 5px solid {{ $item->color  }};border-top: 1px solid {{ $item->color  }};">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ $item->sales->name }}</label>
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title" style="cursor: pointer;" onclick="modal_company(this)" data-name="{{ $item->client->name }}" data-id="{{ $item->crm_client_id }}">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{$item->id}}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="#" class="dropdown-item text-success" data-quotation_order="{{ $item->id }}/{{ $item->sales->id }}/QO/{{ date('Ymhis') }}" onclick="move_to_quotation('{{ route('pipeline.move-to-quotation', $item->id) }}', this)">Move to Quotation <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              @if(!empty($item->project_category))
              {{ $item->project_category }}
              @endif
              <p class="mb-0"> {{ $item->name }} </p>

              @if(!empty($item->description))
              <p><pre>{{ $item->description }}</pre></p>
              @endif
              <p>Rp. {{ number_format($item->price,0,'','.') }}</p>
              <a href="{{ asset('storage/projects/'. $item->id .'/'. $item->file) }}" target="_blank">{{ $item->file }}</a>
              <hr />
              <p>
                @if($item->projectPipeline)
                  @foreach($item->projectPipeline as $i)
                    @if($i->pipeline_status == $item->pipeline_status)
                      {!! status_pipeline_card($i) !!}
                    @endif
                  @endforeach
                @endif
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      
      <div class="col-2" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
          <h3 class="float-left">Quotation </h3>
          <h3 class="float-right">{{ count_($quotation, true) }}</h3>
          <label style="bottom: 0;right: 0;position: absolute;">Rp. {{ number_format( count_($quotation) ) }}</label>
          <div class="clearfix"></div>
          <div class="progress progress-sm mt-1 mb-0">
            <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 10%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="clearfix"></div><br />
        @foreach($quotation as $item)
        <div class="card mt-0 mb-0" style="border-left: 5px solid {{ $item->color  }};border-top: 1px solid {{ $item->color  }};">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ $item->sales->name }}</label>
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title" style="cursor: pointer;" onclick="modal_company(this)" data-name="{{ $item->client->name }}" data-id="{{ $item->crm_client_id }}">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="javascript:void(0)" onclick="move_to_negotation('{{ route('pipeline.move-to-negotiation', $item->id) }}', this)" data-negotation_order="{{ $item->id }}/{{ $item->sales->id }}/NO/{{ date('Ymhis') }}"  class="dropdown-item text-success">Move to Negotiation <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" data-po_number="{{ $item->id }}/{{ $item->sales->id }}/PO/{{ date('Ymhis') }}" onclick="move_to_po('{{ route('pipeline.move-to-po', $item->id) }}', this)" class="dropdown-item text-success">Move to PO / Contract <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <strong>{{ get_crm_project_item($item, 'quotation_order') }}</strong><br />
              @if(!empty($item->project_category))
              {{ $item->project_category }}
              @endif
              <p class="mb-0">{{ $item->name }} </p>
              @if(!empty($item->description))
              <p><pre>{{ $item->description }}</pre></p>
              @endif
              <p>Rp. {{ number_format($item->price,0,'','.') }}</p>
              <a href="{{ asset('storage/projects/'. $item->id .'/'. $item->file) }}" target="_blank">{{ $item->file }}</a>
              <hr />
              
              <div class="bs-callout-primary callout-border-left p-1 mb-0 m-t-5" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="1" onclick="history_pipeline(this, 'Seed')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>Seed
              </div>

              <p>
                @if($item->projectPipeline)
                  @foreach($item->projectPipeline as $i)
                    @if($i->pipeline_status == $item->pipeline_status)
                      {!! status_pipeline_card($i) !!}
                    @endif
                  @endforeach
                @endif
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="col-2" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
          <h3 class="float-left">Negotiation </h3>
          <h3 class="float-right">{{ count_($negotiation, true) }}</h3>
          <label style="bottom: 0;right: 0;position: absolute;">Rp. {{ number_format( count_($negotiation) ) }}</label>
          <div class="clearfix"></div>
          <div class="progress progress-sm mt-1 mb-0">
            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="clearfix"></div><br />
        @foreach($negotiation as $item)
        <div class="card mt-0 mb-0" style="border-left: 5px solid {{ $item->color  }};border-top: 1px solid {{ $item->color  }};">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ $item->sales->name }}</label>
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title" style="cursor: pointer;" onclick="modal_company(this)" data-name="{{ $item->client->name }}" data-id="{{ $item->crm_client_id }}">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="javascript:void(0)" data-po_number="{{ $item->id }}/{{ $item->sales->id }}/PO/{{ date('Ymhis') }}" onclick="move_to_po('{{ route('pipeline.move-to-po', $item->id) }}', this)" class="dropdown-item text-success">Move to PO / Contract <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <strong>{{ get_crm_project_item($item, 'negotation_order') }}</strong><br />
              @if(!empty($item->project_category))
              {{ $item->project_category }}
              @endif
              <p class="mb-0">{{ $item->name }} </p>
              @if(!empty($item->description))
              <p><pre>{{ $item->description }}</pre></p>
              @endif
              <p>Rp. {{ number_format($item->price,0,'','.') }}</p>
              <a href="{{ asset('storage/projects/'. $item->id .'/'. $item->file) }}" target="_blank">{{ $item->file }}</a>
              <hr />
              
              <div class="bs-callout-primary callout-border-left p-1 mb-0 m-t-5" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="1" onclick="history_pipeline(this, 'Seed')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>Seed
              </div>
              <div class="bs-callout-primary callout-border-left p-1 mb-0 mt-1" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="2" onclick="history_pipeline(this, 'Quotation')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>Quotation
              </div>

              <p>
                @if($item->projectPipeline)
                  @foreach($item->projectPipeline as $i)
                    @if($i->pipeline_status == $item->pipeline_status)
                      {!! status_pipeline_card($i) !!}
                    @endif
                  @endforeach
                @endif
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="col-2" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
          <h3 class="float-left">PO / Contract  </h3>
          <h3 class="float-right">{{ count_($po, true) }}</h3>
          <label style="bottom: 0;right: 0;position: absolute;">Rp. {{ number_format( count_($po) ) }}</label>
          <div class="clearfix"></div>
          <div class="progress progress-sm mt-1 mb-0">
            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="clearfix"></div><br />
        @foreach($po as $item)
        <div class="card mt-0 mb-0" style="border-left: 5px solid {{ $item->color  }};border-top: 1px solid {{ $item->color  }};">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ $item->sales->name }}</label>
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title" style="cursor: pointer;" onclick="modal_company(this)" data-name="{{ $item->client->name }}" data-id="{{ $item->crm_client_id }}">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="{{ route('pipeline.move-to-change-request', $item->id) }}" class="dropdown-item text-success">Move to Change Request <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <strong>{{ get_crm_project_item($item, 'po_number') }}</strong><br />
              {{ get_crm_payment_method(get_crm_project_item($item, 'payment_method')) }}
              
              @if(get_crm_project_item($item, 'payment_method') == 1)
                <br />
                <ul>
                  <li>Project Timeline : {{ get_crm_project_item($item, 'month') }} Month</li>
                  <li>Start Date : {{ get_crm_project_item($item, 'start_date') }}</li>
                  <li>End Date : {{ get_crm_project_item($item, 'start_date') }}</li>
                </ul>
              @endif

              @if(get_crm_project_item($item, 'payment_method') == 2)
                {{ get_crm_project_item($item, 'year') }} Tahun<br />
              @endif

              @if(!empty($item->project_category))
              {{ $item->project_category }}
              @endif
              <p class="mb-0">{{ $item->name }} </p>
              @if(!empty($item->description))
              <p><pre>{{ $item->description }}</pre></p>
              @endif
              <p>Rp. {{ number_format($item->price,0,'','.') }}</p>
              <a href="{{ asset('storage/projects/'. $item->id .'/'. $item->file) }}" target="_blank">{{ $item->file }}</a>
              <hr />
              <div class="bs-callout-primary callout-border-left p-1 mb-0 m-t-5" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="1" onclick="history_pipeline(this, 'Seed')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>Seed
              </div>
              <div class="bs-callout-primary callout-border-left p-1 mb-0 mt-1" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="2" onclick="history_pipeline(this, 'Quotation')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>Quotation
              </div>

              <div class="bs-callout-primary callout-border-left p-1 mb-0 mt-1" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="3" onclick="history_pipeline(this, 'Negotation')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>Negotation
              </div>
              
              <p>
                @if($item->projectPipeline)
                  @foreach($item->projectPipeline as $i)
                    @if($i->pipeline_status == $item->pipeline_status)
                      {!! status_pipeline_card($i) !!}
                    @endif
                  @endforeach
                @endif
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="col-2" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
        <h3 class="float-left">Change Request </h3>
          <h3 class="float-right">{{ count_($cr, true) }}</h3>
          <label style="bottom: 0;right: 0;position: absolute;">Rp. {{ number_format( count_($cr) ) }}</label>
          <div class="clearfix"></div>
          <div class="progress progress-sm mt-1 mb-0">
            <div class="progress-bar bg-gradient-x-pink" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="clearfix"></div><br />
        @foreach($cr as $item)
        <div class="card mt-0 mb-0" style="border-left: 5px solid {{ $item->color  }};border-top: 1px solid {{ $item->color  }};">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ $item->sales->name }}</label>
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title" style="cursor: pointer;" onclick="modal_company(this)" data-name="{{ $item->client->name }}" data-id="{{ $item->crm_client_id }}">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <p class="mb-0"><i class="ft ft-check-circle text-success"></i> {{ $item->name }} </p>
              @if(!empty($item->description))
              <p><pre>{{ $item->description }}</pre></p>
              @endif
              <p>Rp. {{ number_format($item->price,0,'','.') }}</p>
              <a href="{{ asset('storage/projects/'. $item->id .'/'. $item->file) }}" target="_blank">{{ $item->file }}</a>
              <hr />

              <div class="bs-callout-primary callout-border-left p-1 mb-0 m-t-5" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="1" onclick="history_pipeline(this, 'Seed')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>Seed
              </div>
              <div class="bs-callout-primary callout-border-left p-1 mb-0 mt-1" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="2" onclick="history_pipeline(this, 'Quotation')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>Quotation
              </div>
              <div class="bs-callout-primary callout-border-left p-1 mb-0 mt-1" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="3" onclick="history_pipeline(this, 'Negotation')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>Negotation
              </div>
              <div class="bs-callout-primary callout-border-left p-1 mb-0 mt-1" role="alert" style="cursor: pointer;" data-id="{{ $item->id }}" data-status="4" onclick="history_pipeline(this, 'Negotation')">
                <span class="alert-icon">
                  <i class="ft-list"></i>
                </span>PO
              </div>

              <p>
                @if($item->projectPipeline)
                  @foreach($item->projectPipeline as $i)
                    @if($i->pipeline_status == $item->pipeline_status)
                      {!! status_pipeline_card($i) !!}
                    @endif
                  @endforeach
                @endif
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade text-left" id="move_to_negotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" id="form-move-to-negotation" method="post" action="" enctype="multipart/form-data"  autocomplete="off">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Move to Negotation</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Negotation Number</label>
                </div>
                <div class="col-md-12">
                  <input type="text" readonly="true" class="form-control" name="negotation_order" value="" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label class="label-control">Attach File</label>
              </div>
              <div class="col-md-12">
                <input type="file" class="form-control" name="file" />
              </div>
            </div>
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Price</label>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control idr" name="price" placeholder="Rp. " />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label class="label-control">Submit Date</label>
              </div>
              <div class="col-md-12">
                <input type="text" class="form-control datepicker" name="date">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Move Negotation <i class="ft ft-arrow-right"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="move_to_po" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" id="form-move-to-po" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Move to PO</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
          <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">PO Number</label>
                </div>
                <div class="col-md-12">
                  <input type="text" readonly="true" class="form-control" name="po_number" value="{{ date('Ymhis') }}">
                </div>
              </div>
            </div>
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Attach Document</label>
                </div>
                <div class="col-md-12">
                  <input type="file" class="form-control" name="file">
                </div>
              </div>
            </div>
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Price</label>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control idr" name="price" placeholder="Rp. ">
                </div>
              </div>
            </div>

            <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Payment Method</label>
                </div>
                <div class="col-md-12">
                  <select class="form-control" name="payment_method">
                    <option value="">- Select -</option>
                    <option value="1">Perpetual License</option>
                    <option value="2">Subscription</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- payment method Subscription -->
            <div class="form-body subscription" style="display: none">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Subscription</label>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <select name="year" class="form-control">
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">Year</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- payment method  Perpetual License -->
            <div class="form-body perpetual_license" style="display: none">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Perpetual License</label>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <input type="number" class="form-control" name="month" placeholder="Project Timeline (Month)" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">Month</span>
                    </div>
                  </div>
                </div>
                <div class="clearfix mt-2"></div>
                <div class="col-md-6 float-left">
                  <input type="text" class="form-control datepicker" name="start_date" placeholder="Start Date">
                </div>
                <div class="col-md-6 float-left">
                  <input type="text" class="form-control" readonly="true" name="end_date" placeholder="End Date">
                </div><div class="clearfix"></div>
              </div>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Move to PO <i class="ft ft-arrow-right"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="move_to_quotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" id="form-move-to-quotation" method="post" action="" enctype="multipart/form-data"  autocomplete="off">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Move to Quotation</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Quotation Number</label>
                </div>
                <div class="col-md-12">
                  <input type="text" readonly="true" class="form-control" name="quotation_order" value="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label class="label-control">Attach Quotation</label>
              </div>
              <div class="col-md-12">
                <input type="file" class="form-control" name="file">
              </div>
            </div>
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Price</label>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control idr" name="price" placeholder="Rp. ">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label class="label-control">Submit Date</label>
              </div>
              <div class="col-md-12">
                <input type="text" class="form-control datepicker" name="date">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Move Quotation <i class="ft ft-arrow-right"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="modal_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title company_name">Profile</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <th style="border-top:0;">Company</th>
            <td style="border-top:0;"> : </td>
            <td style="border-top:0;" class="title-company"></td>
          </tr>
          <tr>
            <th>Telepon</th>
            <td> : </td>
            <td class="title-telepon"></td>
          </tr>
          <tr>
            <th>Email</th>
            <td> : </td>
            <td class="title-email"></td>
          </tr>
          <tr>
            <th>Address</th>
            <td> : </td>
            <td class="title-address"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade text-left" id="modal_add_note" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="" id="form-add-note" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        <div class="modal-header">
          <h4 class="modal-title company_name">Update</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <div class="col-md-6 float-left pl-0">
                <select class="form-control" name="title">
                  <option value="">Update Type</option>
                  <option>Call</option>
                  <option>Mail</option>
                  <option>Meet</option>
                  <option>Demo</option>
                </select>
              </div>
              <div class="col-md-6 pr-0 float-right">
                <input type="text" name="date" class="form-control datepicker" placeholder="Date">
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="note" rows="5" placeholder="Typing here"></textarea>
            </div>
            <div class="form-group">
              <input type="file" name="file" /> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Update <i class="ft ft-plus"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade text-left" id="modal_history_pipeline" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="" id="form-add-note" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        <div class="modal-header">
          <h4 class="modal-title title_history_pipeline">Pipeline</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modal_history pb-5"></div>
      </form>
    </div>
  </div>
</div>
@section('js')
<script type="text/javascript">
  
  Date.prototype.addMonths = function (m) {
    var d = new Date(this);
    var years = Math.floor(m / 12);
    var months = m - (years * 12);
    if (years) d.setFullYear(d.getFullYear() + years);
    if (months) d.setMonth(d.getMonth() + months);
    return d;
  }

  function history_pipeline(el, title)
  {
    $('.modal_history').html("");
    $.ajax({
      type: 'POST',
      url: '{{ route('ajax.get-pipeline-history') }}',
      data: {'id' : $(el).data('id'), 'status' : $(el).data('status'), '_token' : $("meta[name='csrf-token']").attr('content')},
      dataType: 'json',
      success: function (data) {
        var html  = "";
        $.each(data.update, function(k,item){

          html += '<div class="mt-0 p-1" style="border-bottom: 1px solid #e4e7ed;">'+
                      '<strong>'+ item.title +'</strong><br />'+ item.value;

          if(item.file != null)
          {
            html += '<br /><a href="'+ item.url_file +'" target="_blank">'+ item.file +'</a>';
          }
          
          html +='<div class="clearfix"></div>'+
                  '<small class="float-left" style="font-size: 70%;">'+ item.created_at +'</small>'+
                  '<small class="float-right">'+ item.user.name +'</small>'+
                  '</div>';


        });

        $('.modal_history').html(html);
      }
    });

    $('.title_history_pipeline').html(title);

    $("#modal_history_pipeline").modal("show");
  }

  function addMonths (date, count) {
    if (date && count) {
      var m, d = (date = new Date(+date)).getDate()

      date.setMonth(date.getMonth() + count, 1)
      m = date.getMonth()
      date.setDate(d)
      if (date.getMonth() !== m) date.setDate(0)
    }
    return date
  }


  $("input[name='month']").on('input', function(){
    calculate_start_date();
  });


  $("input[name='start_date']").on('change', function(){
    calculate_start_date();      
  });

  function calculate_start_date()
  {
    var start_date = $("input[name='start_date']").val();
    
    if(start_date == "") return false;

    var end_date = new Date(start_date).addMonths(parseInt($("input[name='month']").val()));

    month = end_date.getMonth() + 1;

    $("input[name='end_date']").val( end_date.getFullYear() +'-'+ (month < 10 ? '0'+month : month)  +'-'+ end_date.getDate() );
  }

  $("select[name='payment_method']").on('change', function(){

    $('.perpetual_license, .subscription').hide();

    if($(this).val() == 1)
    {
      $('.perpetual_license').show();
    }

    if($(this).val() == 2)
    {
       $('.subscription').show();
    }

  });

  function move_to_po(url, el)
  {
    $("input[name='po_number']").val($(el).data('po_number'));
    
    $("#form-move-to-po").attr('action', url);

    $("#move_to_po").modal("show");
  }

  function add_note(action)
  {
    $("#form-add-note").attr('action', action);

    $("#modal_add_note").modal("show"); 
  }

  function modal_company(el)
  {
     $.ajax({
      type: 'POST',
      url: '{{ route('ajax.get-company') }}',
      data: {'id' : $(el).data('id'), '_token' : $("meta[name='csrf-token']").attr('content')},
      dataType: 'json',
      success: function (data) {
        var data = data.data;

        $('.title-company').html(data.name);
        $('.title-telepon').html(data.telepon);
        $('.title-email').html(data.email);
        $('.title-address').html(data.address);
      }
    });

    $('.company_name').html($(el).data('name'));

    $('#modal_company').modal('show');
  }

  function move_to_quotation(action, el)
  {
    $("input[name='quotation_order']").val($(el).data('quotation_order'));

    $("#form-move-to-quotation").attr('action', action);

    $("#move_to_quotation").modal('show');
  }

  function move_to_negotation(action, el)
  {
    $("input[name='negotation_order']").val($(el).data('negotation_order'));

    $("#form-move-to-negotation").attr('action', action);

    $("#move_to_negotation").modal('show');
  }
</script>
@endsection
@endsection