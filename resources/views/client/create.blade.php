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
            <li class="breadcrumb-item"><a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">Client / Customer
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="col-md-6 float-right">
      <button type="button" class="btn btn-info btn-sm float-right" onclick="submit_form()"><i class="ft ft-save"></i> Save</button>
    </div>
  </div>
  <div class="content-body">
    <div class="row">
      <div class="col-12 px-0">
        <form class="form form-horizontal" id="form-client" method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data" autocomplete="off">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
                
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
                      <div class="col-md-12">
                        <label class="label-control">Name / Company</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Telepon</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Telepon" name="handphone" value="{{ old('handphone') }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Email</label>
                      </div>
                      <div class="col-md-12">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" />
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
                        <textarea class="form-control" name="address" rows="6" placeholder="Typing here.. ">{{ old('address') }}</textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 float-left">
                        <label class="label-control">Status</label>
                      </div>
  
                      @if(Auth::user()->user_access_id == 1)
                      <div class="col-md-6 float-left">
                        <label class="label-control">Sales</label>
                      </div>                    
                      <div class="clearfix"></div>
                      @endif


                      <div class="col-md-6 float-left">
                        <select class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                       @if(Auth::user()->user_access_id == 1)
                        <div class="col-md-6 float-left">
                          <select class="form-control" name="sales_id">
                            @foreach(list_sales() as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div> 
                       @endif
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
                        <input type="text" class="form-control" placeholder="PIC Name" name="pic_name" value="{{ old('pic_name') }}" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Job Title</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Job Title" name="pic_position" value="{{ old('pic_position') }}" />
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Telepon</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="PIC Telepon" name="pic_telepon"value="{{ old('pic_telepon') }}" />
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Email</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="PIC Email" name="pic_email"value="{{ old('pic_email') }}" />
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
  function submit_form()
  {
    $("#form-client").submit();
  }
  function open_dialog_photo()
  {
      $("input[name='foto']").trigger('click');   
  }
</script>
@endsection
@endsection