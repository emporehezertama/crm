@extends('layouts.administrator')

@section('title', 'Client / Customer')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Client / Customer</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Client / Customer
            </li>
          </ol>
        </div>
      </div>
    </div>

    <div class="col-md-6 float-right">
      <button type="submit" class="btn btn-info btn-sm float-right"><i class="ft ft-save"></i> Save</button>
    </div>

  </div>
  <div class="content-body">
    <div class="row">
      <div class="col-12 px-0">
        <form class="form form-horizontal" method="POST" action="{{ route('sales.client.store') }}" enctype="multipart/form-data">
          <div class="col-6 float-left">
             <div class="card">
              <div class="card-header">
                <h4 class="card-title">Company</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="form-body">
                    
                    <div class="form-group">
                      <div class="col-md-6 float-left">
                        <img src="{{ asset('images/your-logo.png') }}" />
                      </div>
                      <div class="col-md-6 float-left">
                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm" onclick="open_dialog_photo()"><i class="ft ft-image"></i> Change Logo</a>
                        <input type="file" class="form-control" name="foto" style="display: none;">
                      </div><div class="clearfix"></div><br />
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Name / Company</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Telepon</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Telepon" name="handphone">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Email</label>
                      </div>
                      <div class="col-md-12">
                        <input type="email" class="form-control" name="email" placeholder="Email" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Password Login</label>
                      </div>
                      <div class="col-md-12">
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Address</label>
                      </div>
                      <div class="col-md-12">
                        <textarea class="form-control" name="address" rows="6" placeholder="Typing here.. "></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6">
                        <label class="label-control">Status</label>
                      </div>
                      <div class="col-md-6 float-left">
                        <select class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
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
              <div class="card-header">
                <h4 class="card-title">PIC Company</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  {{ csrf_field() }}
                  <div class="form-body">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Name</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="PIC Name" name="pic_name">
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Telepon</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="PIC Telepon" name="pic_telepon">
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Email</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="PIC Email" name="pic_email">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><div class="clearfix"></div>
        </form>
    </div>
  </div>
</div>
@section('js')
<script type="text/javascript">
  function open_dialog_photo()
  {
      $("input[name='foto']").trigger('click');   
  }
</script>
@endsection
@endsection