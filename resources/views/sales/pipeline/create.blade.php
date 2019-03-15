@extends('layouts.administrator')

@section('title', 'New Card')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <h3 class="content-header-title mb-0">New Card</h3>
      <div class="float-right">
        <button type="submit" class="btn btn-info btn-sm" onclick="document.getElementById('form_card').submit()"><i class="ft ft-save"></i> Save Card</button>
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
        <form class="form form-horizontal" method="POST" id="form_card" name="form_card" enctype="multipart/form-data" action="{{ route('sales.pipeline.store') }}">
          {{ csrf_field() }}
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
                        <select class="form-control" name="crm_client_id">
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
        </form>
    </div>
  </div>
</div>
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

    $(".color").colorPick({
        'initialColor' : '#E74C3C',
        'onColorSelected': function(){
          $("input[name='color']").val(this.color);
          this.element.css({'backgroundColor': this.color, 'color': this.color});
        }
    });
</script>
@endsection
@endsection