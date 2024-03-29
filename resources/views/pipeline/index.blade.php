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
      <div class="col-md-4 float-right">
        <div class="btn-group">
          <a href="{{ route('pipeline.create') }}" class="btn btn-round btn-info"><i class="ft ft-plus"></i> Add Card</a>
          <a href="{{ route('task.index') }}" class="btn btn-round btn-success"><i class="ft ft-plus"></i> Add Task</a>
        </div>
      </div>
      <div class="col-md-6 float-right text-right">
        <form method="GET" action="" name="form_search" id="form_search" autocomplete="off">
          <fieldset class="form-group position-relative">
            <input type="text" class="form-control round" name="search" id="iconLeft11" value="{{ (isset($_GET['search']) and $_GET['search'] != "") ? $_GET['search'] : '' }}" placeholder="Search Company Name, Pic Name, Project Name, Address">
            <div class="form-control-position"><i style="cursor: pointer;" onclick="document.getElementById('form_search').submit();" class="ft ft-search primary"></i>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <div class="content-body">
    <div class="row row_pipeline">

      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
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
        <div class="card" style="border-left: 5px solid {{ $item->color  }};border-bottom: 1px solid {{ $item->color  }}; margin-bottom:5px;">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ isset($item->client->sales->name) ? $item->client->sales->name : '' }}</label>
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
                        <a href="#" class="dropdown-item text-success" data-price="Rp. {{ number_format($item->price,0,'','.') }}"  data-quotation_order="{{ $item->id }}/{{ isset($item->sales->id) ? $item->sales->id : '' }}/QO/{{ date('Ymhis') }}" onclick="move_to_quotation('{{ route('pipeline.move-to-quotation', ['id' => $item->id]) }}', this)">Move to Quotation <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              
              @if(!empty($item->project_category_id))
              <p><a href="javascript:void(0)" onclick="edit_card(this)" data-id="{{ $item->id }}" data-project_category_id="{{ $item->project_category_id }}" data-project_product= "{{ $item->projectProduct }}" data-name="{{ $item->name }}" data-crm_client_id="{{ $item->crm_client_id }}" data-pipeline_status="{{ $item->pipeline_status }}" data-price="{{ $item->price }}" data-project_type="{{ $item->project_type }}" data-durataion="{{ $item->durataion }}" data-license_number="{{ $item->license_number }}" data-description="{{ $item->description }}" data-color="{{ $item->color }}">{{ $item->projectCategory->name }}</a></p>
              @endif
              <p class="mb-0 float-left">{{ $item->name }} </p>
              @if(!empty($item->description))
              <p class="text-right" style="cursor: pointer;">
                <i class="ft ft-list" onclick="show_description(this)"></i>
              </p>
              <p style="display: none;" class="float-right">{{ $item->description }}</p>
              @endif
              <div class="clearfix"></div>

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
        <div class="card mt-0" style="border-left: 5px solid {{ $item->color  }};border-bottom: 1px solid {{ $item->color  }}; margin-bottom:5px;">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ isset($item->client->sales->name) ? $item->client->sales->name : '' }}</label>
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
                        <!-- <a href="javascript:void(0)" onclick="move_to_negotation('{{ route('pipeline.move-to-negotiation', ['id' => $item->id]) }}', this)" data-negotation_order="{{ $item->id }}/{{ $item->sales->id }}/NO/{{ date('Ymhis') }}"  class="dropdown-item text-success">Move to Negotiation <i class="ft-arrow-right"></i></a> -->
                        <a href="javascript:void(0)" data-po_number="{{ $item->id }}/{{ $item->sales->id }}/PO/{{ date('Ymhis') }}" data-price="Rp. {{ number_format($item->price,0,'','.') }}" data-month="{{ get_crm_project_item($item, 'month') }}" data-start_date="{{ get_crm_project_item($item, 'start_date') }}" data-end_date="{{ get_crm_project_item($item, 'end_date') }}" onclick="move_to_po('{{ route('pipeline.move-to-po', ['id' => $item->id]) }}', this)" class="dropdown-item text-success">Move to PO / Contract <i class="ft-arrow-right"></i></a>
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

              @if(!empty($item->project_category_id))
              <p><a href="javascript:void(0)" onclick="edit_card(this)" data-id="{{ $item->id }}" data-project_category_id="{{ $item->project_category_id }}" data-project_product= "{{ $item->projectProduct }}" data-name="{{ $item->name }}" data-crm_client_id="{{ $item->crm_client_id }}" data-pipeline_status="{{ $item->pipeline_status }}" data-project_type="{{ $item->project_type }}" data-durataion="{{ $item->durataion }}" data-license_number="{{ $item->license_number }}" data-price="{{ $item->price }}" data-description="{{ $item->description }}" data-color="{{ $item->color }}">{{ $item->projectCategory->name }}</a></p>
              @endif
              <p class="mb-0 float-left">{{ $item->name }} </p>
              @if(!empty($item->description))
              <p class="text-right" style="cursor: pointer;">
                <i class="ft ft-list" onclick="show_description(this)"></i>
              </p>
              <p style="display: none;" class="float-right">{{ $item->description }}</p>
              @endif
              <div class="clearfix"></div>

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
        <div class="card mt-0" style="border-left: 5px solid {{ $item->color  }};border-bottom: 1px solid {{ $item->color  }}; margin-bottom:5px;">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ isset($item->client->sales->name) ? $item->client->sales->name : '' }}</label>
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
                        <a href="{{ route('pipeline.move-to-po-done', ['id' => $item->id]) }}" class="dropdown-item text-success">PO Done <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        
                        @if(get_crm_project_item($item, 'payment_method') == 1)
                        <a href="javascript:void(0)" class="dropdown-item" data-id="{{ $item->id }}" data-po_number="{{ get_crm_project_item($item, 'po_number') }}" onclick="add_invoice_perpetual(this)"><i class="ft-plus"></i> Invoice</a>
                        @endif
                        
                        @if(get_crm_project_item($item, 'payment_method') == 2)
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_invoice_subscription('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Invoice</a>
                        @endif

                        <a href="{{ route('pipeline.terminate', ['id' => $item->id]) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <p class="float-left"><strong>{{ get_crm_project_item($item, 'po_number') }}</strong></p>
              <p style="text-align: right; font-size: 20px; margin-top: 10px; " onclick="show_bottom(this)"><a href="javascript:void(0)"><i class="ft ft-list"></i></a></p>
              <div style="display: none;">
                <p>{{ get_crm_payment_method(get_crm_project_item($item, 'payment_method')) }}</p>
                <ul>
                  <li>Project Timeline : {{ get_crm_project_item($item, 'month') }} Month</li>
                  <li>Start Date : {{ get_crm_project_item($item, 'start_date') }}</li>
                  <li>End Date : {{ get_crm_project_item($item, 'start_date') }}</li>
                </ul>

                @if(get_crm_project_item($item, 'payment_method') == 1)
                
                @endif

                @if(get_crm_project_item($item, 'payment_method') == 2)
                  {{ get_crm_project_item($item, 'year') }} Tahun<br />
                @endif
                
                @if(!empty($item->project_category_id))
                <p><a href="javascript:void(0)" onclick="edit_card(this)" data-id="{{ $item->id }}" data-project_category_id="{{ $item->project_category_id }}" data-project_product= "{{ $item->projectProduct }}" data-name="{{ $item->name }}" data-project_type="{{ $item->project_type }}" data-durataion="{{ $item->durataion }}" data-license_number="{{ $item->license_number }}"data-crm_client_id="{{ $item->crm_client_id }}" data-pipeline_status="{{ $item->pipeline_status }}" data-price="{{ $item->price }}" data-description="{{ $item->description }}" data-color="{{ $item->color }}">{{ $item->projectCategory->name }}</a></p>
                @endif
                <p class="mb-0 float-left">{{ $item->name }} </p>
                @if(!empty($item->description))
                <p class="text-right" style="cursor: pointer;">
                  <i class="ft ft-list" onclick="show_description(this)"></i>
                </p>
                <p style="display: none;" class="float-right">{{ $item->description }}</p>
                @endif
                <div class="clearfix"></div>

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
        <h3 class="float-left">Invoice </h3>
          <h3 class="float-right">{{ count_invoice($invoice, true) }}</h3>
          <label style="bottom: 0;right: 0;position: absolute;">Rp. {{ number_format( count_invoice($invoice) ) }}</label>
          <div class="clearfix"></div>
          <div class="progress progress-sm mt-1 mb-0">
            <div class="progress-bar bg-gradient-x-pink" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="clearfix"></div><br />
        @foreach($invoice as $item)
        <div class="card mt-0" style="border-left: 5px solid {{ $item->color  }};border-top: 1px solid {{ $item->color  }};border-bottom: 1px solid {{ $item->color  }}; margin-bottom:5px;">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ isset($item->client->sales->name) ? $item->client->sales->name : '' }}</label>
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title" style="cursor: pointer;" onclick="modal_company(this)" data-name="{{ $item->project->client->name }}" data-id="{{ $item->project->crm_client_id }}">{{ isset($item->project->client->name) ? $item->project->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->date)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.print-invoice', ['id' => $item->id]) }}" target="_blank" class="dropdown-item"><i class="ft-printer"></i> Print / Download</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <p><strong>{{ $item->invoice_number }}</strong></p>
              <p class="mb-0">{{ $item->payment_term }} </p>
              <ul>
                <li>Sub Total : {{ format_idr($item->sub_total) }}</li>
                <li>Tax : {{ $item->tax }}% ({{ format_idr($item->tax_price) }})</li>
                <li>Total : {{ format_idr($item->total) }}</li>
              </ul>
              <p>{{ $item->remarks }}</p>
              <a href="javascript:void(0)" data-id="{{ $item->id }}" data-invoice_number="{{ $item->invoice_number }}" data-total="{{ format_idr($item->total) }}" onclick="pay_invoice(this)" class="btn btn-success btn-block"><i class="ft ft-check"></i> Pay</a>
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
        <h3 class="float-left">PO Done </h3>
          <h3 class="float-right">{{ count_($po_done, true) }}</h3>
          <label style="bottom: 0;right: 0;position: absolute;">Rp. {{ number_format( count_($po_done) ) }}</label>
          <div class="clearfix"></div>
          <div class="progress progress-sm mt-1 mb-0">
            <div class="progress-bar bg-gradient-x-pink" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="clearfix"></div><br />
        @foreach($po_done as $item)
        <div class="card mt-0" style="border-left: 5px solid {{ $item->color  }};border-top: 1px solid {{ $item->color  }};border-bottom: 1px solid {{ $item->color  }}; margin-bottom:5px;">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ isset($item->client->sales->name) ? $item->client->sales->name : '' }}</label>
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title" style="cursor: pointer;" onclick="modal_company(this)" data-name="{{ $item->client->name }}" data-id="{{ $item->crm_client_id }}">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
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
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="col-2 box_pipeline" style="flex:0 0 20%; max-width: 20%;">
        <div class="pt-1 pl-0 pr-0" style="position: relative;">
        <h3 class="float-left">Payment Receive </h3>
          <h3 class="float-right">{{ count_invoice_payment($payment_receive, true) }}</h3>
          <label style="bottom: 0;right: 0;position: absolute;">Rp. {{ number_format( count_invoice_payment($payment_receive) ) }}</label>
          <div class="clearfix"></div>
          <div class="progress progress-sm mt-1 mb-0">
            <div class="progress-bar bg-gradient-x-pink" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="clearfix"></div><br />
        @foreach($payment_receive as $item)
        <div class="card mt-0" style="border-left: 5px solid {{ $item->color  }};border-top: 1px solid {{ $item->color  }};border-bottom: 1px solid {{ $item->color  }}; margin-bottom:5px;">
          <label style="position: absolute;right: 8px; top: 0;color: {{ $item->color  }};">{{ isset($item->project->client->sales->name) ? $item->project->client->sales->name : ''  }}</label>
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title" style="cursor: pointer;" onclick="modal_company(this)" data-name="{{ $item->project->client->name }}" data-id="{{ $item->project->crm_client_id }}">{{ isset($item->project->client->name) ? $item->project->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->date)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('pipeline.add-note', ['id' => $item->id]) }}')"><i class="ft-plus"></i> Update</a>
                        <a href="{{ route('pipeline.print-invoice', ['id' => $item->id]) }}" target="_blank" class="dropdown-item"><i class="ft-printer"></i> Print / Download</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <p><strong>{{ $item->invoice_number }}</strong></p>
              <ul style="padding-left: 15px;">
                <li>Total Payment : {{ format_idr($item->total_payment) }}</li>
                <li>Payment Date : {{ $item->date_payment }}</li>
                <li>Remarks : {{ $item->remarks_payment }}</li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade text-left" id="modal_pay_invoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" id="form-pay-invoice" method="post" action="{{ route('pipeline.store-invoice-pay') }}" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Invoice</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}   
            <input type="hidden" name="id" >
            <!-- payment method  Perpetual License -->
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-12">Invoice Number</label>
                <div class="col-md-12">
                  <input type="text" readonly="true" name="invoice_number" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-12">Value (IDR)</label>
                <div class="col-md-12">
                  <input type="text" required name="total_payment" class="form-control idr">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-12">Payment Date</label>
                <div class="col-md-12">
                  <input type="text" required name="date_payment" class="form-control datepicker">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-12">Remarks</label>
                <div class="col-md-12">
                  <input type="text" name="remarks_payment" class="form-control">
                </div>
              </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Pay <i class="ft ft-arrow-right"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="modal_pay_invoice_perpetual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" id="form-pay-invoice-perpetual" method="post" action="{{ route('pipeline.store-invoice-perpetual') }}" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Invoice</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="max-height: 500px; overflow-y: scroll;">
          {{ csrf_field() }}   
            <input type="hidden" name="crm_project_id" >
            <input type="hidden" name="id" >
            <!-- payment method  Perpetual License -->
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-12">PO Number</label>
                <div class="col-md-12">
                  <input type="text" readonly="true" name="po_number" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Payment Term</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" readonly="true" name="payment_term" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Invoice Number</label>
                <div class="col-md-12">
                  <input type="text" readonly="true" name="invoice_number" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Date</label>
                <div class="col-md-12">
                  <input type="text" readonly="true" name="date" class="form-control datepicker">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Sub Total</label>
                <div class="col-md-12">
                  <input type="text" name="sub_total" class="form-control idr">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 float-left">Tax (%)</label>
                <label class="col-md-8 float-left">Tax Price (Rp)</label>
                <div class="col-md-4 float-left">
                  <input type="text" name="tax" class="form-control" placeholder="Persens %">
                </div>
                <div class="col-md-8 float-left">
                  <input type="text" readonly="true" class="form-control idr" placeholder="Rp. 0" name="tax_price">
                </div><div class="clearfix"></div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Total</label>
                <div class="col-md-12">
                  <input type="text" readonly="true" name="total" class="form-control idr">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Remarks</label>
                <div class="col-md-12">
                  <input type="text" name="remarks" class="form-control">
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Submit <i class="ft ft-arrow-right"></i></button>
        </div>
      </form>
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
                <input type="text" class="form-control datepicker" name="submit_date">
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
<div class="modal fade text-left" id="modal_invoice_perpetual_license" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form class="" id="form-invoice-perpetual-license" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Invoice Perpetual License</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}   
            <!-- payment method  Perpetual License -->
            <div class="form-body perpetual_license">
              <div class="form-group mb-2">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="border-top:0;">Terms</th>
                      <th style="border-top:0;">Milestone</th>
                      <th style="border-top:0;">%</th>
                      <th style="border-top:0;">Value (Rp)</th>
                      <th style="border-top:0;"></th>
                    </tr>
                  </thead>
                  <tbody class="table-perpetual-license">
                    
                  </tbody>
                </table>
              </div>
            </div>
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
        <div class="modal-body" style="max-height: 600px; overflow-y: scroll;">
          {{ csrf_field() }}
          <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">PO Number</label>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <input type="text" class="form-control" name="po_number" required  aria-describedby="basic-addon2">
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
                  <input type="number" class="form-control" required name="month" placeholder="Project Timeline (Month)" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Month</span>
                  </div>
                </div>
              </div>
              <div class="clearfix mt-2"></div>
              <div class="col-md-6 float-left">
                <input type="text" class="form-control datepicker" required name="start_date" placeholder="Start Date">
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
                  <input type="text" class="form-control idr" required name="price" placeholder="Rp. ">
                </div>
              </div>
            </div>

            <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Payment Method</label>
                </div>
                <div class="col-md-12">
                  <select class="form-control" name="payment_method" required>
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
                    <input type="number" class="form-control" name="year">
                    <div class="input-group-append">
                      <select class="form-control" name="subscription_year_or_month">
                        <option value="1">Year</option>
                        <option value="2">Month</option>
                      </select>  
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Start Date</label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="start_date_subscription" class="form-control datepicker">
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
                <input type="text" class="form-control modal-value idr" placeholder="Value (Rp)" />
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
                  <label class="label-control">Project Timeline</label>
                </div>
              <div class="col-md-12">
                <div class="input-group">
                  <input type="number" class="form-control" required name="monthQuo" placeholder="Project Timeline (Month)" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Month</span>
                  </div>
                </div>
              </div>
              <div class="clearfix mt-2"></div>
              <div class="col-md-6 float-left">
                <input type="text" class="form-control datepicker" required name="start_date_quo" placeholder="Start Date">
              </div>
              <div class="col-md-6 float-left">
                <input type="text" class="form-control" readonly="true" name="end_date_quo" placeholder="End Date">
              </div><div class="clearfix"></div>
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
          <tr>
            <th>PIC Name</th>
            <td> : </td>
            <td class="title-pic_name"></td>
          </tr>
          <tr>
            <th>PIC Telepon</th>
            <td> : </td>
            <td class="title-pic_telepon"></td>
          </tr>
          <tr>
            <th>PIC Email</th>
            <td> : </td>
            <td class="title-pic_email"></td>
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
          <h4 class="modal-title modal_update_title">Update</h4>
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
                <input type="text" name="date" class="form-control datepicker" placeholder="Date Update (Default Today)">
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="note" rows="5" placeholder="Description"></textarea>
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

<div class="modal fade text-left" id="modal_add_invoice_subscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="" id="form-add-invoice" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        <div class="modal-header">
          <h4 class="modal-title company_name">Invoice</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control modal-invoice-nominal" value="" >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Submit <i class="ft ft-plus"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade text-left" id="modal_edit_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ route('pipeline.update-note') }}" id="form-edit-update" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        <input type="hidden" name="id" />
        <input type="hidden" name="pipeline_status" />
        <div class="modal-header">
          <h4 class="modal-title modal_update_title">Update</h4>
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
                <input type="text" name="date" class="form-control datepicker" placeholder="Date Update (Default Today)">
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="note" rows="5" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
              <div class="col-md-6 float-left pl-0">
                <input type="file" name="file" />
              </div>
              <div class="clearfix"></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Update <i class="ft ft-save"></i></button>
          <a href="" class="btn btn-danger btn-sm delete" onclick="return confirm('Delete data ?')" title="Delete">Delete<i class="ft ft-trash-2"></i></a>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade text-left" id="modal_edit_card" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ route('pipeline.update-card') }}" id="form-edit-card" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        <input type="hidden" name="id" />
        <input type="hidden" name="pipeline_status" />
        <div class="modal-header">
          <h4 class="modal-title modal_update_title">Update Card</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-6 float-left">
             <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="form-body">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Client / Customer</label>
                      </div>
                      <div class="col-md-12">
                        <select class="form-control" name="crm_client_id" disabled="true">
                          <option value="">Select Client / Customer</option>
                          @foreach(list_client() as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-body">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Project Category</label>
                      </div>
                      <div class="col-md-12">
                        <select class="form-control" name="project_category_id" disabled="true">
                          <option value="">Select Project Category</option>
                          @foreach(list_parent() as $item)
                          <option value="{{ $item->id }}" data-child="{{ $item->child }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-body">
                    <div class="form-group" id="ProductList" style="display: none;">
                      <div class="col-md-12">
                        <label class="label-control">Product List</label>
                      </div>
                      <div class="col-md-12" id="ChildList">
                      </div>
                    </div>
                  </div>
                  <div class="form-body">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Project Name</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="name">
                      </div>
                    </div>
                  </div>
                  <div class="form-body">
                    <div class="form-group">
                      <div class="col-md-6 float-left">
                        <label class="label-control">Status</label>
                      </div>
                      <div class="col-md-6 float-left">
                        <label class="label-control">Project Value</label>
                      </div>
                      <div class="col-md-6 float-left">
                        <select class="form-control" name="pipeline_status">
                          <option value="">Select Status</option>
                          @foreach(list_pipeline_status() as $key => $val)
                          <option value="{{ $key }}">{{ $val }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6 float-left">
                        <input type="text" name="price" class="form-control idr" placeholder="Rp. ">
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>

                  <div class="form-body">
                    <div class="form-group">
                      <div class="col-md-6 float-left">
                        <label class="label-control">Project Type</label>
                      </div>
                      <div class="col-md-6 float-right">
                        <label class="label-control" id="divLabelDuration" style="display: none; text-align: left;">Duration(Day/s)</label>
                        <label class="label-control" id="divLabelLicense" style="display: none; text-align: left;">License Number</label>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-6 float-left">
                        <select class="form-control" name="project_type" id="project_type" required>
                          <option value="0">Select Type</option>
                          @foreach(list_type_project() as $key => $val)
                          <option value="{{ $key }}">{{ $val }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6 float-right">
                         <input type="number" class="form-control" name="durataion" placeholder="Duration(Day/s)" aria-describedby="basic-addon2" id="durataion" style="display: none;">
                         <input type="text" class="form-control" id="license_number" name="license_number" style="display: none;">
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-6 float-left">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="form-body">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Note</label>
                      </div>
                      <div class="col-md-12">
                        <textarea class="form-control" name="description" style="height: 125px;"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 float-left">
                        <label class="label-control">Attach File</label>
                      </div>
                      <div class="col-md-6 float-left">
                        <label class="label-control">Color Tags</label>
                      </div>
                      <div class="col-md-6 float-left">
                        <input type="file" name="file" class="form-control">
                      </div>
                      <div class="col-md-6 float-left">
                        <div class="color" style="float: left;"></div>                                
                        <input type="text" class="form-control" style="float: left; width: 88%;"  placeholder="Color Tags" name="color"><div class="clearfix"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Update <i class="ft ft-save"></i></button>
        </div>
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
    min-height: 500px;
  }
  .row_pipeline h4 {
    white-space: normal;
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

  .card-body {
    white-space: initial;
  }

  /* width */
::-webkit-scrollbar {
  width: 2px;
  height: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #F9FAFD; 
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
  $("select[name='project_type']").on('change', function(){
    var el = $(this).find(":selected").val();
    if(el == 1)
    {
      document.getElementById('divLabelDuration').style.display = "none";
      document.getElementById('durataion').style.display = "none";
      document.getElementById('divLabelLicense').style.display = "block";
      document.getElementById('license_number').style.display = "block";
    }
    if(el == 2)
    {   
      document.getElementById('divLabelLicense').style.display = "none";
      document.getElementById('license_number').style.display = "none";
      document.getElementById('divLabelDuration').style.display = "block";
      document.getElementById('durataion').style.display = "block";
    } 
  });
</script>>

<script type="text/javascript"> 
  function show_description(el)
  {
    $(el).parent().next().slideToggle("slow");
  }

  function edit_card(el)
  {
    $("#form-edit-card input[name='id']").val($(el).data('id'));
    $("#form-edit-card select[name='crm_client_id']").val($(el).data('crm_client_id'));
    $("#form-edit-card select[name='project_category_id']").val($(el).data('project_category_id'));
    $("#form-edit-card input[name='name']").val($(el).data('name'));
    $("#form-edit-card select[name='pipeline_status']").val($(el).data('pipeline_status'));
    $("#form-edit-card input[name='price']").val($(el).data('price'));
    $("#form-edit-card select[name='project_type']").val($(el).data('project_type'));
    $("#form-edit-card input[name='durataion']").val($(el).data('durataion'));
    $("#form-edit-card input[name='license_number']").val($(el).data('license_number'));
    $("#form-edit-card textarea[name='description']").val($(el).data('description'));
    $("#form-edit-card input[name='color']").val($(el).data('color'));
    
    //
    //crm_product_id
    //limit_user

    $("#modal_edit_card").modal("show");
        var project = $("select[name='project_category_id'] :selected");
        var valSelect = project.val();
        if(valSelect > 0)
        {
          document.getElementById('ProductList').style.display = "block";
          var html ='';
            $(project.data('child')).each(function(k,v){
              var a = v.user_limit;
              html +='<p style="margin-bottom: 4px">';
              //var produk = $(el).data('project_product');
              var check='';
              var limit ='';
              $($(el).data('project_product')).each(function(i,j){
                if(j.crm_product_id == v.id){
                  check = 'checked';
                  if(j.limit_user > 0){
                      limit = j.limit_user;
                  }
                  if(j.limit_user == null){
                    limit='';
                  }
                }
              });
              html += '<label><input type="checkbox" style="margin-right: 10px;" '+check+' name="project_product_id['+v.id+']" value="'+v.id+'">'+ v.name+'</label>';
              if(a == 1)
                html += '<input type="text" style="margin-left: 20px;" value="'+limit+'" class="form-control" name="limit_user['+v.id+']" placeholder="User Limit">';
              html +='</p>';
            });
          $('#ChildList').html(html);
        }else{
          document.getElementById('ProductList').style.display = "none";
        }

        //project type
        var projectType = $("select[name='project_type'] :selected");
        var valSelectType = projectType.val();

        if(valSelectType <= 0)
        {
            document.getElementById('divLabelLicense').style.display = "none";
            document.getElementById('license_number').style.display = "none";
            document.getElementById('divLabelDuration').style.display = "none";
            document.getElementById('durataion').style.display = "none";
        }
        if(valSelectType == 1)
        {
            document.getElementById('divLabelDuration').style.display = "none";
            document.getElementById('durataion').style.display = "none";
            document.getElementById('divLabelLicense').style.display = "block";
            document.getElementById('license_number').style.display = "block";
        }
        if(valSelectType == 2)
        {
            document.getElementById('divLabelLicense').style.display = "none";
            document.getElementById('license_number').style.display = "none";
            document.getElementById('divLabelDuration').style.display = "block";
            document.getElementById('durataion').style.display = "block"; 
        }
  }

  function edit_update(el)
  {
    $("#form-edit-update input[name='id']").val($(el).data('id'));
    $("#form-edit-update select[name='title']").val($(el).data('title'));
    $("#form-edit-update textarea[name='note']").val($(el).data('note'));
    $("#form-edit-update input[name='date']").val($(el).data('date'));
    $("#form-edit-update input[name='pipeline_status']").val($(el).data('pipeline_status'));
    $("#form-edit-update a.delete").attr('href', $(el).data('delete'));

    $("#modal_edit_update").modal("show");
  }

  function pay_invoice(el)
  {
    $("#form-pay-invoice input[name='id']").val($(el).data('id'));
    $("#form-pay-invoice input[name='invoice_number']").val($(el).data('invoice_number'));
    $("#form-pay-invoice input[name='total_payment']").val($(el).data('total'));
    $("#modal_pay_invoice").modal("show");
  }

  function add_invoice_perpetual(el)
  {
    var cls = '.table-perpetual-license';

    $('.table-perpetual-license').html("");
     $.ajax({
        type: 'POST',
        url: '{{ route('ajax.get-invoice-perpetual-license') }}',
        data: {'id' : $(el).data('id'), '_token' : $("meta[name='csrf-token']").attr('content')},
        dataType: 'json',
        success: function (data) {
          
          var html = '';
          $.each(data.items, function(k, i){
            html += '<tr>';
            html += '<td>'+ i.terms +'</td>';
            html += '<td>'+ i.milestone +'</td>';
            html += '<td>'+ i.persen +'%</td>';
            html += '<td>'+ (i.value == null ? '' : i.value) +'</td>';
            html += '<td>';

            if(i.status == 0)
            {
              html += '<a href="javascript:void(0)" data-id="'+ i.id +'" data-crm_project_id="'+ $(el).data('id') +'" data-invoice_number="'+ i.invoice_number +'" data-terms="'+ i.terms +'" data-value="'+ (i.value == null ? '0' : i.value) +'" data-po_number="'+ $(el).data('po_number') +'" onclick="pay_invoice_perpetual(this)" class="btn btn-info btn-sm"><i class="ft ft-check"></i> Pay</a>';
            }

            html += '</td>';
            html += '</tr>';
          });
          
          $('.table-perpetual-license').append(html);

          $("#modal_invoice_perpetual_license").modal("show");
        }
      }); 
  }

  $("input.modal-persen").on('input', function(){

    var price   = $("#form-move-to-po input[name='price']").val();
    var persen  = $(this).val();  
    var value   = (parseInt(persen) * parseInt(replace_idr(price))) / 100;

    $('.modal-value').val(Math.ceil(value));
    
    init_price_format();

  });

  $("#form-pay-invoice-perpetual input[name='tax']").on('input', function(){

    var tax       = $(this).val() != "" ? parseInt($(this).val()) : 0 ;
    var price     = $("#form-pay-invoice-perpetual input[name='sub_total']").val();
    var tax_price = tax * replace_idr(price) / 100;

    $("#form-pay-invoice-perpetual  input[name='tax_price']").val(tax_price);
    $("#form-pay-invoice-perpetual  input[name='total']").val(parseInt(replace_idr(price)) + parseInt(tax_price) );

    init_price_format();
  });


  function pay_invoice_perpetual(el)
  {
    $("#modal_invoice_perpetual_license").modal("hide");

    $("#form-pay-invoice-perpetual input[name='po_number']").val($(el).data('po_number'));
    $("#form-pay-invoice-perpetual input[name='payment_term']").val($(el).data('terms'));
    $("#form-pay-invoice-perpetual input[name='sub_total']").val($(el).data('value'));
    $("#form-pay-invoice-perpetual input[name='invoice_number']").val($(el).data('invoice_number'));
    $("#form-pay-invoice-perpetual input[name='total']").val($(el).data('value'));
    $("#form-pay-invoice-perpetual input[name='crm_project_id']").val($(el).data('crm_project_id'));
    $("#form-pay-invoice-perpetual input[name='id']").val($(el).data('id'));

    $("#modal_pay_invoice_perpetual").modal("show");
    
    init_price_format();
  }

  function add_invoice_subscription(action)
  {
    $("#form-add-invoice-subscription").attr('action', action);

    $("#modal_add_invoice_subscription").modal("show"); 
  }

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
    
      // if($(this).prev().find('a i.ft-arrow-down'))
      // {
      //   $(this).prev().find('a i.ft-arrow-down').removeClass('ft-arrow-down').addClass('ft-arrow-up');
      // }
      // else
      // {
      //   $(this).prev().find('a i.ft-arrow-up').removeClass('ft-arrow-up').addClass('ft-arrow-down');
      // }

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
        var valueType = "";
        var descriptionType = "";
        $.each(data.update, function(k,item){

          if(item.value == null)
          {
            valueType = "";
          }else{
            valueType = item.value;
          }

          if(item.title == null)
          {
            descriptionType = "";
          }else{
            descriptionType = item.title;
          }

          html += '<div class="mt-0 p-1" style="border-bottom: 1px solid #e4e7ed;">'+
                      '<strong>'+ descriptionType +'</strong><br />'+ valueType;

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

  $("input[name='monthQuo']").on('input', function(){
    calculate_start_date_quo();
  });

  $("input[name='start_date_quo']").on('change', function(){
    calculate_start_date_quo();      
  });
  
  function calculate_start_date_quo()
  {
    var start_date = $("input[name='start_date_quo']").val();
    
    if(start_date == "") return false;

    var end_date = new Date(start_date).addMonths(parseInt($("input[name='monthQuo']").val()));

    month = end_date.getMonth() + 1;

    $("input[name='end_date_quo']").val( end_date.getFullYear() +'-'+ (month < 10 ? '0'+month : month)  +'-'+ end_date.getDate() );
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
    //$("input[name='price']").val($(el).data('price'));

    $("#form-move-to-po input[name='price']").val($(el).data('price'));
    $("#form-move-to-po input[name='month']").val($(el).data('month'));
    $("#form-move-to-po input[name='start_date']").val($(el).data('start_date'));
    $("#form-move-to-po input[name='end_date']").val($(el).data('end_date'));

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
        $('.title-telepon').html(data.handphone);
        $('.title-email').html(data.email);
        $('.title-address').html(data.address);
        $('.title-pic_name').html(data.pic_name);
        $('.title-pic_telepon').html(data.pic_telepon);
        $('.title-pic_email').html(data.pic_email);
      }
    });

    $('.company_name').html($(el).data('name'));

    $('#modal_company').modal('show');
  }

  function move_to_quotation(action, el)
  {
    $("input[name='quotation_order']").val($(el).data('quotation_order'));
    $("input[name='price']").val($(el).data('price'));

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