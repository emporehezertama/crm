@extends('layouts.administrator')

@section('title', 'Setting')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Setting</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Setting
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
      <div class="btn-group">
        <a href="javascript:void(0)" class="btn btn-round btn-info" onclick="submit_setting()"><i class="fa fa-plus"></i> Save Setting</a>
      </div>
    </div>
  </div>
  <div class="content-body">
    <form class="form form-horizontal" id="form-setting" method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">General</h4>
          </div>
          <div class="card-content collapse show">
            <div class="card-body pt-0">
                {{ csrf_field() }}
                <div class="form-body">
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Website Title</label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Typing here .." name="setting[title]" value="{{ get_setting('title') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Description</label>
                    </div>
                    <div class="col-md-12">
                      <textarea class="form-control" style="height: 200px;" name="setting[description]" placeholder="Description">{{ get_setting('description') }}</textarea>
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
                      <input type="text" class="form-control" placeholder="Typing here .." name="setting[telepon]" value="{{ get_setting('telepon') }}">
                    </div>
                    <div class="col-md-6 float-left">
                      <input type="text" class="form-control" placeholder="Typing here .." name="setting[fax]" value="{{ get_setting('fax') }}">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Email</label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Typing here .." name="setting[email]" value="{{ get_setting('email') }}">
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Address</label>
                    </div>
                    <div class="col-md-12">
                      <textarea class="form-control" name="setting[address]">{{ get_setting('address') }}</textarea>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Images</h4>
          </div>
          <div class="card-content collapse show">
            <div class="card-body pt-0">
                <div class="form-body">
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Logo</label>
                    </div>
                    <div class="col-md-5 float-left">
                      <input type="file" class="form-control" name="logo">
                    </div>
                    <div class="col-md-5 float-left">
                    @if(get_setting('logo') != "")
                    <img src="{{ asset('upload/setting/'. get_setting('logo')) }}" style="height: 50px;" />
                    @endif
                    </div><div class="clearfix"></div>
                  </div>
                </div>
                <div class="form-body">
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Favicon</label>
                    </div>
                    <div class="col-md-5 float-left">
                      <input type="file" class="form-control" name="favicon">
                    </div>
                    <div class="col-md-5 float-left">
                      @if(get_setting('favicon') != "")
                      <img src="{{ asset('upload/setting/'. get_setting('favicon')) }}" style="height: 10px;" />
                      @endif
                    </div><div class="clearfix"></div>
                  </div>
                </div>
                <div class="form-body">
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Footer Logo</label>
                    </div>
                    <div class="col-md-5 float-left">
                      <input type="file" class="form-control" name="logo_footer">
                    </div>
                    <div class="col-md-5 float-left">
                      @if(get_setting('logo_footer') != "")
                      <img src="{{ asset('upload/setting/'. get_setting('logo_footer')) }}" style="height: 50px;" />
                      @endif
                    </div><div class="clearfix"></div><br />

                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Footer Title</label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" name="setting[footer_title]" class="form-control" placeholder="Type here .." value="{{ get_setting('footer_title') }}" />
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="col-md-12">
                        <label class="label-control">Footer Description</label>
                      </div>
                      <div class="col-md-12">
                        <textarea class="form-control" name="setting[footer_description]" placeholder="Type here ..">{{ get_setting('footer_description') }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">SMTP Server</h4>
          </div>
          <div class="card-content collapse show">
            <div class="card-body pt-0">
                <div class="form-body">
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Mail Driver</label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Typing here .." name="mail">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Mail Host</label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Typing here .." name="mail_host">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Mail Port</label>
                    </div>
                    <div class="col-md-12">
                      <input type="number" class="form-control" placeholder="Typing here .." name="mail_port">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Mail Username</label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Typing here .." name="mail_username">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Mail Password</label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Typing here .." name="mail_password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="label-control">Mail Encryption</label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Typing here .." name="mail_encryption">
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>

    </form>
  </div>
</div>
<script type="text/javascript">
  function submit_setting()
  {
    $("#form-setting").submit();
  }
</script>
@endsection