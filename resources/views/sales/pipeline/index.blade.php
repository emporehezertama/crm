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
        <a href="{{ route('sales.pipeline.create') }}" class="btn btn-round btn-info"><i class="ft ft-plus"></i> </a>
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
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title" onclick="modal_company(this)" data-name="{{ $item->client->name }}">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{$item->id}}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="#" class="dropdown-item text-success" onclick="move_to_quotation('{{ route('sales.pipeline.move-to-quotation', $item->id) }}')">Move to Quotation <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('sales.pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Add Note</a>
                        <a href="{{ route('sales.pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
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
                      {!! status_pipeline_card($i) !!}
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
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="{{ route('sales.pipeline.move-to-negotiation', $item->id) }}" class="dropdown-item text-success">Move to Negotiation <i class="ft-arrow-right"></i></a>
                        <a href="{{ route('sales.pipeline.move-to-po', $item->id) }}" class="dropdown-item text-success">Move to PO / Contract <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('sales.pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Add Note</a>
                        <a href="{{ route('sales.pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <p class="mb-0">{{ $item->name }} </p>
              @if(!empty($item->description))
              <p><pre>{{ $item->description }}</pre></p>
              @endif
              <p>Rp. {{ number_format($item->price,0,'','.') }}</p>
              <a href="{{ asset('storage/projects/'. $item->id .'/'. $item->file) }}" target="_blank">{{ $item->file }}</a>
              <hr />
              <p>
                @if($item->projectPipeline)
                  @foreach($item->projectPipeline as $i)
                    {!! status_pipeline_card($i) !!}
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
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="{{ route('sales.pipeline.move-to-po', $item->id) }}" class="dropdown-item text-success">Move to PO / Contract <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('sales.pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Add Note</a>
                        <a href="{{ route('sales.pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <p class="mb-0">{{ $item->name }} </p>
              @if(!empty($item->description))
              <p><pre>{{ $item->description }}</pre></p>
              @endif
              <p>Rp. {{ number_format($item->price,0,'','.') }}</p>
              <a href="{{ asset('storage/projects/'. $item->id .'/'. $item->file) }}" target="_blank">{{ $item->file }}</a>
              <hr />
              <p>
                @if($item->projectPipeline)
                  @foreach($item->projectPipeline as $i)
                    {!! status_pipeline_card($i) !!}
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
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="{{ route('sales.pipeline.move-to-change-request', $item->id) }}" class="dropdown-item text-success">Move to Change Request <i class="ft-arrow-right"></i></a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('sales.pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Add Note</a>
                        <a href="{{ route('sales.pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body pt-0">
              <p class="mb-0">{{ $item->name }} </p>
              @if(!empty($item->description))
              <p><pre>{{ $item->description }}</pre></p>
              @endif
              <p>Rp. {{ number_format($item->price,0,'','.') }}</p>
              <a href="{{ asset('storage/projects/'. $item->id .'/'. $item->file) }}" target="_blank">{{ $item->file }}</a>
              <hr />
              <p>
                @if($item->projectPipeline)
                  @foreach($item->projectPipeline as $i)
                    {!! status_pipeline_card($i) !!}
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
          <div class="card-content">
            <div class="card-header">
              <h4 class="card-title">{{ isset($item->client->name) ? $item->client->name : '' }}</h4>
              <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <span class="dropdown">
                      <a id="btnSearchDrop{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></a>
                      <span aria-labelledby="btnSearchDrop{{ $item->id }}" class="dropdown-menu mt-1 dropdown-menu-right" style="min-width: 15rem;">
                        <a href="javascript:void(0)" class="dropdown-item" onclick="add_note('{{ route('sales.pipeline.add-note', $item->id) }}')"><i class="ft-plus"></i> Add Note</a>
                        <a href="{{ route('sales.pipeline.terminate', $item->id) }}" class="dropdown-item"><i class="ft-trash-2"></i> Terminate</a>
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
              <p>
                @if($item->projectPipeline)
                  @foreach($item->projectPipeline as $i)
                    {!! status_pipeline_card($i) !!}
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
<div class="modal fade text-left" id="move_to_quotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" id="form-move-to-quotation" method="post" action="" enctype="multipart/form-data">
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
                  <label class="label-control">Attach Quotation</label>
                </div>
                <div class="col-md-12">
                  <input type="file" class="form-control" name="file">
                </div>
              </div>
            </div>
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="label-control">Nominal</label>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control idr" name="price" placeholder="Rp. ">
                </div>
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
        <form class="" method="post" action="">
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade text-left" id="modal_add_note" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="" id="form-add-note" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header">
          <h4 class="modal-title company_name">Add Note</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <textarea class="form-control" name="note" rows="5" placeholder="Typing here"></textarea>
            </div>
            <div class="form-group">
              <input type="file" name="file" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary btn-sm" data-dismiss="modal"><i class="ft ft-x"></i> Close</button>
          <button type="submit" class="btn btn-info btn-sm">Add Note <i class="ft ft-plus"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
@section('js')
<script type="text/javascript">

  function add_note(action)
  {
    $("#form-add-note").attr('action', action);

    $("#modal_add_note").modal("show"); 
  }

  function modal_company(el)
  {
    $('.company_name').html($(el).data('name'));

    $('#modal_company').modal('show')
  }

  function move_to_quotation(action)
  {
    $("#form-move-to-quotation").attr('action', action);
    $("#move_to_quotation").modal('show');
  }
</script>
@endsection
@endsection