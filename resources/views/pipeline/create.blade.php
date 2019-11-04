@extends('layouts.administrator')

@section('title', 'New Card')

@section('content')
  <form class="form form-horizontal" method="POST" id="form_card" autocomplete="off" name="form_card" enctype="multipart/form-data" action="{{ route('pipeline.store') }}">
    {{ csrf_field() }}
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

    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
          <h3 class="content-header-title mb-0">New Card</h3>
          <div class="float-right">
            <button type="submit" class="btn btn-info btn-sm" ><i class="ft ft-save"></i> Save Card</button>
          </div>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">New Card
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12 px-0">

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
                          <select class="form-control" name="crm_client_id" required>
                            <option value="">Select Client / Customer</option>
                            @foreach(list_client() as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12">Project Category</label>
                      <div class="col-md-12">
                        <select class="form-control" name="project_category_id" required>
                          <option value=""> Select Project Category </option>
                          @foreach(list_parent() as $item)
                            <option value="{{ $item->id }}" data-child="{{ $item->child }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group" id="ProductList" style="display: none;">
                      <label class="col-md-12" style="margin-bottom: 15px">Product List</label>
                      </br>
                      <div class="col-md-12" id="ChildList">
                      </div>
                    </div>
                    <div class="form-body" id="company_url" style="display: none;">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label class="label-control">Company Url</label>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="form-control" name="url" placeholder="The url will be : http://em-hr.co.id/company_url">
                        </div>
                      </div>
                    </div>
                    <div class="form-body" id="company_db" style="display: none;">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label class="label-control">Company Database name</label>
                        </div>
                        <div class="col-md-12">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">emhr_</div>
                            </div>
                            <input type="text" class="form-control" name="db_name" placeholder="Username">
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="form-body">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label class="label-control">User Name</label>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="form-control" name="user_name">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <label class="label-control">Password</label>
                        </div>
                        <div class="col-md-12">
                          <input type="password" class="form-control" name="password">
                        </div>
                      </div>
                    </div>
                    <div class="form-body">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label class="label-control">Project Name</label>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="form-control" name="name" required>
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
                          <select class="form-control" name="pipeline_status" required>
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
                          <select class="form-control" name="project_type" required>
                            <option value="">Select Type</option>
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
                    <div class="form-body" id="divExpiredDate" style="display: none;">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label class="label-control">Expired Date </label>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="form-control" readonly="true" name="expired_date" id="expired_date" placeholder="Expired Date">
                        </div>
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
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
  </form>
@section('js')
  <style type="text/css">
    .color{
      border-radius: 5px;
      width: 12%;
      height: 36px;
      cursor: pointer;
      -webkit-transition: all linear .2s;
      -moz-transition: all linear .2s;
      -ms-transition: all linear .2s;
      -o-transition: all linear .2s;
      transition: all linear .2s;
      border: 1px solid #eee;
    }

  </style>
  <link rel="stylesheet" href="{{ asset('app-assets/vendors/js/colorpicker/src/colorPick.css') }}">
  <script src="{{ asset('app-assets/vendors/js/colorpicker/src/colorPick.js') }}"></script>
  <script type="text/javascript">
    $("select[name='project_type']").on('change', function(){
      var el = $(this).find(":selected").val();
      if(el == 1)
      {
        document.getElementById('divLabelDuration').style.display = "none";
        document.getElementById('durataion').style.display = "none";
        document.getElementById('divExpiredDate').style.display = "none";
        document.getElementById('divLabelLicense').style.display = "block";
        document.getElementById('license_number').style.display = "block";
      }
      if(el == 2)
      {
        document.getElementById('divLabelLicense').style.display = "none";
        document.getElementById('license_number').style.display = "none";
        document.getElementById('divLabelDuration').style.display = "block";
        document.getElementById('durataion').style.display = "block";
        document.getElementById('divExpiredDate').style.display = "block";
      }
    });

    $("input[name='durataion']").on('input', function(){
      var dt = new Date();
      var value = parseInt($("input[name='durataion']").val());
      dt.setDate(dt.getDate() + value);
      //$("input[name='expired_date']").val(dt);

      month = dt.getMonth() + 1 ;

      $("input[name='expired_date']").val( dt.getFullYear() +'-'+ (month < 10 ? '0'+month : month) +'-'+ dt.getDate() );

    });

    $(".color").colorPick({
      'initialColor' : '#E74C3C',
      'onColorSelected': function(){
        $("input[name='color']").val(this.color);
        this.element.css({'backgroundColor': this.color, 'color': this.color});
      }
    });
    $("select[name='project_category_id']").on('change', function(){
      var el = $(this).find(":selected");
      var valSelect = el.val();
      if(valSelect > 0)
      {
        document.getElementById('ProductList').style.display = "block";

        var html ='';
        $(el.data('child')).each(function(k,v){
          var check='';
          var readonly='';
          if(v.id == 3){
            check = 'checked disabled';
          }

          var a = v.user_limit;
          html +='<p style="margin-bottom: 4px">';
          if(v.id == 3){
            html += '<label><input type="checkbox" style="margin-right: 10px;" '+check+'>'+ v.name+'</label>';
            html += '<input type="hidden" style="margin-right: 10px;" name="project_product_id['+v.id+']" value="'+v.id+'">';
          }else{
            html += '<label><input type="checkbox" style="margin-right: 10px;" '+check+' name="project_product_id['+v.id+']" value="'+v.id+'">'+ v.name+'</label>';
          }
          if(a == 1)
            html += '<input type="text" style="margin-left: 20px;"  class="form-control" name="limit_user['+v.id+']" placeholder="User Limit">';
          html +='</p>';
        });
        $('#ChildList').html(html);
      }else{
        document.getElementById('ProductList').style.display = "none";

      }
      if(valSelect == 1) {
        document.getElementById('company_db').style.display = "block";
        document.getElementById('company_url').style.display = "block";
      }else {
        document.getElementById('company_db').style.display = "none";
        document.getElementById('company_url').style.display = "none";
      }
    });

    $('#form_card').submit(function() {
      $('project_product_id').removeAttr('disabled');
    });


  </script>
@endsection
@endsection