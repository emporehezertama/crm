@extends('layouts.administrator')

@section('title', 'Task Management')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Task Management</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Task Management</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
      <div class="btn-group">
        <a href="{{ route('task.create') }}" class="btn btn-round btn-info"><i class="ft ft-plus"></i> Add Task</a>
      </div>
    </div>
  </div>
  <div class="content-body">
    <div class="row row_pipeline">

      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
        <div class=" pt-1 pl-0 pr-0" style="position: relative;">
          <h3 class="float-left">Kick Of Meeting </h3>
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
                        <a href="#" class="dropdown-item text-success" data-quotation_order="{{ $item->id }}/{{ $item->sales->id }}/QO/{{ date('Ymhis') }}" onclick="move_to_quotation('{{ route('pipeline.move-to-quotation', ['id' => $item->id]) }}', this)">Move to Quotation <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
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
      
      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
          <h3 class="float-left">Assesment </h3>
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
                        <a href="javascript:void(0)" onclick="move_to_negotation('{{ route('pipeline.move-to-negotiation', ['id' => $item->id]) }}', this)" data-negotation_order="{{ $item->id }}/{{ $item->sales->id }}/NO/{{ date('Ymhis') }}"  class="dropdown-item text-success">Move to Negotiation <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" data-po_number="{{ $item->id }}/{{ $item->sales->id }}/PO/{{ date('Ymhis') }}" onclick="move_to_po('{{ route('pipeline.move-to-po', ['id' => $item->id]) }}', this)" class="dropdown-item text-success">Move to PO / Contract <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
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

      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
          <h3 class="float-left">UI / UX</h3>
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
                        
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <p class="float-left"><strong>{{ get_crm_project_item($item, 'po_number') }}</strong></p>
              <p style="text-align: right; font-size: 20px; margin-top: 10px; " onclick="show_bottom(this)"><a href="javascript:void(0)"><i class="ft ft-arrow-down"></i></a></p>
              
              <div style="display: none;">
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
        </div>
        @endforeach
      </div>

      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
        <h3 class="float-left">Development </h3>
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
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
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

      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
        <h3 class="float-left">QA & Testing </h3>
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
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
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

      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
        <h3 class="float-left">Implementation</h3>
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
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
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

      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
        <h3 class="float-left">UAT</h3>
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
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
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

      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
        <h3 class="float-left">Go Live</h3>
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
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
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
        <div class="modal-body" style="max-height: 400px; overflow-y: scroll;">
          {{ csrf_field() }}
          <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">PO Number</label>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <input type="text" class="form-control" name="po_number"  aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2" onclick="auto_generate_po()" style="cursor: pointer;">Auto Generate</span>
                      <input type="hidden" name="po-auto-generate">
                    </div>
                  </div>
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
            <div class="form-group">
              <div class="col-md-12">
                  <label class="label-control">Project Timeline</label>
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
              <div class="form-group mb-2">
                <div class="col-md-12">
                  <label class="label-control">Payment Milestone</label>
                </div>
                <table class="table table-payment-milestone">
                  <tr>
                    <td>Terms</td>
                    <td>Milestone</td>
                    <td>%</td>
                    <td>Value (Rp)</td>
                  </tr>
                  <tr class="empty-table-1">
                    <td colspan="4" style="text-align: center;"><i>empty</i></td>
                  </tr>
                </table>
                <a href="javascript:void(0)" onclick="add_terms()" class="btn btn-sm btn-info"><i class="ft ft-plus"></i></a>
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

<div class="modal fade text-left" id="modal_add_terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="" id="form-add-terms" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        <div class="modal-header">
          <h4 class="modal-title company_name">Add Terms</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control modal-terms" placeholder="Terms">
            </div>
            <div class="form-group">
              <textarea class="form-control modal-milestone" rows="5" placeholder="Milestone"></textarea>
            </div>
            <div class="form-group">
              <div class="col-md-6 pl-0 float-left">
                <input type="text" class="form-control modal-persen" placeholder="%" />
              </div>
              <div class="col-md-6 pr-0 float-right">
                <input type="text" class="form-control modal-value" placeholder="Value (Rp)" />
              </div><div class="clearfix"></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="button" class="btn btn-info btn-sm" onclick="submit_term()">Add <i class="ft ft-plus"></i></button>
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
              <input type="text" class="form-control" name="title" placeholder="Title">
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

<style type="text/css">
  .row_pipeline {
    display: inline-block !important;
    white-space: nowrap;
    width: 100%;
    overflow-x:scroll;
    min-height: 150px;
  }
  .box_pipeline {
    vertical-align: top;
    display: inline-block !important;
    -box-shadow: 0px 1px 15px 1px rgba(62, 57, 107, 0.07); 
    -background: white;
    border-radius: 0.35rem;
    margin-right: 10px;
    -width: 30%;
    -min-width: 30%;
  }

  /* width */
::-webkit-scrollbar {
  width: 2px;
  height: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #e5e6e8; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b1b4bb; 
}
</style>

@section('js')
<script type="text/javascript">

  function auto_generate_po()
  {
    var generate = $("input[name='po-auto-generate']").val();

    $("input[name='po_number']").val(generate);
  }

  function add_terms()
  {
    $("#modal_add_terms").modal("show");
  }

  function submit_term()
  {
    $('.empty-table-1').html("");

    var term        = $('.modal-terms').val();
    var milestone   = $('.modal-milestone').val();
    var persen      = $('.modal-persen').val();
    var value       = $('.modal-value').val();

    var el  = '<tr>';
        el += '<td>'+ term +'</td>';
        el += '<td>'+ milestone +'</td>';
        el += '<td>'+ persen +'%</td>';
        el += '<td>'+ value;
        el += '<input type="hidden" name="terms[]" value="'+ term +'" />';
        el += '<input type="hidden" name="milestone[]" value="'+ milestone +'" />';
        el += '<input type="hidden" name="persen[]" value="'+ persen +'" />';
        el += '<input type="hidden" name="value[]" value="'+ value +'" />';
        el += '</td>';
        el += '</tr>';

    $('.table-payment-milestone').append(el);
    
    $("#form-add-terms").each(function(){
      $(this).find("input[type='text']").val("");
      $(this).find("textarea").val("");
    });

    $("#modal_add_terms").modal("hide");
  }

  function show_bottom(el)
  {
    $(el).next().slideToggle("slow", function(){

      console.log( $(this).find('a i.ft-arrow-down').attr('class') );

      if($(this).find('a i.ft-arrow-down'))
      {
        $(this).find('a i.ft-arrow-down').removeClass('ft-arrow-down');
      }
      else
      {
        $(this).find('a i.ft-arrow-up').removeClass('ft-arrow-up').addClass('ft-arrow-down');
      }

    });
  }

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
    $("input[name='po-auto-generate']").val($(el).data('po_number'));

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