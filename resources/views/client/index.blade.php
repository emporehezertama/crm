@extends('layouts.administrator')

@section('title', 'Cient / Customer')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Cient / Customer</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Cient / Customer</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
      <div class="btn-group">
        <a id="importDataClient" class="btn btn-round btn-info"><i class="ft ft-plus"></i>Import Data Client</a>
      </div>
      <div class="btn-group">
        <a href="{{ route('client.create') }}" class="btn btn-round btn-info"><i class="ft ft-plus"></i> Cient / Customer</a>
      </div>
    </div>
  </div>
  <div class="content-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="card-body pt-1 pl-1 pr-1 ">
              <div class="table-responsive">
                <table class="table table-striped table-bordered data-table">
                  <thead>
                    <tr>
                      <th style="width: 50px;">#</th>
                      <th>Name / Company</th>
                      <th>Telepon</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Sales / Marketing</th>
                      <th>Created</th>
                      <th style="width: 45px;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $item)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                          {{ $item->name }}
                        </td>
                        <td>{{ $item->handphone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ isset($item->sales->name) ? $item->sales->name : '' }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                          <form method="POST" action="{{ route('client.destroy', $item->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="javascript:void(0)" class="text-danger" title="Delete data" onclick="confirm_delete('Hapus data ini ?', this)"><i class="la la-trash"></i></a>
                            <a href="{{ route('client.edit', $item->id) }}" title="Edit Data"><i class="la la-edit"></i></a>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="col-m-6 pull-left text-left">Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries</div>
                <div class="col-md-6 pull-right text-right">{{ $data->appends($_GET)->render() }}</div><div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>






<!-- MODAL -->
<div class="modal fade text-left" id="modal-import-client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Import Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}   
            <!-- payment method  Perpetual License -->
            <div class="form-body perpetual_license">
              <div class="form-group mb-2">
                <form method="POST" id="form-upload" enctype="multipart/form-data" class="form-horizontal" action="{{ route('client.importClient') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-3">File (xls)</label>
                            <div class="col-md-9">
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
                        <!--a href="http://emhr.local/administrator/payroll/download"><i class="fa fa-download"></i> Download Sample Excel</a-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                        <label class="btn btn-info btn-sm" id="btn_import">Import</label>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>

@section('js')
<script type="text/javascript">

  $('#importDataClient').click(function(){
    $('#modal-import-client').modal('show');
  });

  $("#btn_import").click(function(){
    if($("input[type='file']").val() == "")
    {
        bootbox.alert('File harus dipilih');
        return false;
    }

    $("#form-upload").submit();
    $("#form-upload").hide();
    $('.div-proses- ').show();

  });
</script>
@endsection