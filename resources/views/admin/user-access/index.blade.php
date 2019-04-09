@extends('layouts.administrator')

@section('title', 'User Access')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">User Access</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">User  Access</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
      <div class="btn-group">
        <a href="javascript:void(0)" class="btn btn-round btn-info" data-toggle="modal" data-target="#custom_modal"><i class="ft ft-plus"></i> User Access</a>
      </div>
    </div>
  </div>
  <div class="content-body">
    <!-- Basic Tables start -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="card-body mt-1">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 50px;">#</th>
                      <th>Access</th>
                      <th>Description</th>
                      <th style="width: 100px;"></th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($data as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->description }}</td>
                      <td>
                        <form method="POST" action="{{ route('admin.user-access.destroy', $item->id) }}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <a href="javascript:void(0)" onclick="confirm_delete('Hapus data ini ?', this)" title="Delete" class="text-danger"><i class="la la-trash"></i></a>
                          <a href="javascript:void(0)" onclick="edit_('{{ route('admin.user-access.update', $item->id) }}','{{ $item->name }}','{{ $item->description }}')" title="Edit"><i class="la la-edit"></i></a>
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

@section('custom_modal_content_edit')
  @section('custom_modal_title_edit', 'Edit User Access')
    <form method="POST" action="" id="form-update">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="User Access" name="name" required />
      </div>
      <div class="form-group">
        <textarea placeholder="Description" name="description" class="form-control" required style="height: 100px;"></textarea>
      </div>
      <hr />
      <div class="form-group">
          <button type="submit" class="btn btn-info btn-sm"><i class="ft ft-save"></i> Save</button>
          <button type="button" class="btn btn-sm float-right" data-dismiss="modal">Close <i class="ft ft-arrow-right"></i></button>
      </div>
    </form>
@endsection

@section('custom_modal_content')
  @section('custom_modal_title', 'User Access')
    <form method="POST" action="{{ route('admin.user-access.store') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <input type="text" class="form-control" placeholder="User Access" name="name" required />
      </div>
      <div class="form-group">
        <textarea placeholder="Description" name="description" class="form-control" required style="height: 100px;"></textarea>
      </div>
      <hr />
      <div class="form-group">
          <button type="submit" class="btn btn-info btn-sm"><i class="ft ft-save"></i> Save</button>
          <button type="button" class="btn btn-sm float-right" data-dismiss="modal">Close <i class="ft ft-arrow-right"></i></button>
      </div>
    </form>
@endsection

@section('js')
<script type="text/javascript">
  function edit_(url, name, description)
  {
    $('#form-update').attr('action', url);
    $('.modal-name-edit').val(name);
    $('.modal-description-edit').val(description);

    $("#modal_update").modal("show");
  }
</script>
@endsection
@endsection