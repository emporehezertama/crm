@extends('layouts.administrator')

@section('title', 'Profile')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Profile</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Profile
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
      <div class="btn-group">
        <a href="javascript:void(0)" class="btn btn-round btn-info" onclick="submit_setting()"><i class="fa fa-plus"></i> Save Profile</a>
        <a href="javascript:void(0)" class="btn btn-round btn-warning" data-toggle="modal" data-target="#change_password"><i class="fa fa-plus"></i> Change Password</a>
      </div>
    </div>
  </div>
  <div class="content-body">
    <form class="form form-horizontal" id="form-setting" method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Profile</h4>
          </div>
          <div class="card-content collapse show">
            <div class="card-body pt-0">
                {{ csrf_field() }}
                <div class="form-body">
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Name</label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Typing here .." name="user[name]" value="{{ Auth::user()->name }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 float-left">
                      <label class="label-control">Telepon</label>
                    </div>
                    <div class="col-md-6 float-left">
                      <label class="label-control">Fax</label>
                    </div>
                    <div class="col-md-6 float-left">
                      <input type="text" class="form-control" placeholder="Typing here .." name="user[telepon]" value="{{ Auth::user()->telepon }}">
                    </div>
                    <div class="col-md-6 float-left">
                      <input type="text" class="form-control" placeholder="Typing here .." name="user[fax]" value="{{ Auth::user()->fax }}">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Email</label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Typing here .." name="user[email]" value="{{ Auth::user()->email }}">
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Address</label>
                    </div>
                    <div class="col-md-12">
                      <textarea class="form-control" name="user[address]">{{ Auth::user()->address }}</textarea>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card pt-2">
          <div class="card-content collapse show">
            <div class="card-body pt-0">
              <div class="form-body">
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="label-control">Foto</label>
                  </div>
                  <div class="col-md-5 float-left">
                    <input type="file" class="form-control" name="foto">
                  </div>
                  <div class="col-md-5 float-left">
                  @if(Auth::user()->foto != "")
                  <img src="{{ asset(Auth::user()->foto) }}" style="height: 50px;" />
                  @endif
                  </div><div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade text-left" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.profile.change-password') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label class="col-md-12">New Password</label>
            <div class="col-md-12">
              <input type="password" class="form-control" name="password" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-12">Confirm New Password</label>
            <div class="col-md-12">
              <input type="password" class="form-control" name="confirmation" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-primary">Change Password</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function submit_setting()
  {
    $("#form-setting").submit();
  }
</script>
@endsection