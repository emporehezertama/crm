@extends('layouts.administrator')

@section('title', 'Pages')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Pages</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Pages</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="card-body">
              <form class="form form-horizontal" method="POST" action="{{ route('admin.navigation-page-widget.update', $data->id) }}" enctype="multipart/form-data">
                <ul class="nav nav-tabs">
                  <li class="nav-item" style="position: relative;">
                    <i style="color: yellow;color: yellow;position: absolute;top: 2px;right: -4px;" class="ft ft-star"></i>
                      <a class="nav-link active" id="base-ind" data-toggle="tab" aria-controls="ind" href="#ind" aria-expanded="true">Indonesia </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="base-eng" data-toggle="tab" aria-controls="eng" href="#eng" aria-expanded="false">English</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="base-images" data-toggle="tab" aria-controls="images" href="#images" aria-expanded="false">Images</a>
                  </li>
                </ul>
                
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="tab-content pt-2">
                  <div role="tabpanel" class="tab-pane active" id="ind" aria-expanded="true" aria-labelledby="">
                    <div class="form-body">
                      <div class="form-group">
                        <div class="col-md-9">
                          <label class="label-control">Navigation</label>
                        </div>
                        <div class="col-md-5">
                          <select class="form-control" name="navigation_id">
                            <option value="0">Please Select</option>
                            {!! navigation_select_form($data->navigation_id) !!}
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9">
                          <label class="label-control">Title</label>
                        </div>
                        <div class="col-md-5">
                          <input type="text" class="form-control" name="title" placeholder="Type here .." value="{{ $data->title }}" />
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9">
                          <label class="label-control">Description</label>
                        </div>
                        <div class="col-md-12">
                          <textarea class="form-control" id="ckeditor" name="description" placeholder="Type here .." style="height: 100px;">{{ $data->description }}</textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3">
                          <label class="label-control">Order</label>
                        </div>
                        <div class="col-md-3">
                          <input type="number" class="form-control" name="order" placeholder="Type here .." value="{{ $data->order }}" />
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="tab-pane" id="images" aria-labelledby="base-images">
                    <div class="form-body">
                      <div class="form-group">
                        <div class="col-md-9">
                          <label class="label-control">Image</label>
                        </div>
                        <div class="col-md-5 float-left">
                          <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="col-md-5 float-left">
                          @if(!empty($data->image))
                            <a href="{{ asset($data->image) }}" target="_blank"><img src="{{ asset($data->image) }}" style="height: 150px;" /></a>
                          @endif
                        </div>
                       <div class="clearfix"></div> 
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="eng" aria-labelledby="base-tab2">
                    <div class="form-body">
                      <div class="form-group">
                        <div class="col-md-9">
                          <label class="label-control">Navigation</label>
                        </div>
                        <div class="col-md-5">
                          <select class="form-control" name="navigation_id_eng">
                            <option value="0">Please Select</option>
                            {!! navigation_select_form($data->navigation_id) !!}
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9">
                          <label class="label-control">Title</label>
                        </div>
                        <div class="col-md-5">
                          <input type="text" class="form-control" name="title_eng" placeholder="Type here .." value="{{ $data->title }}" />
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9">
                          <label class="label-control">Description</label>
                        </div>
                        <div class="col-md-12">
                          <textarea class="form-control" id="ckeditor_eng" name="description_eng" placeholder="Type here .." style="height: 100px;">{{ $data->description }}</textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3">
                          <label class="label-control">Order</label>
                        </div>
                        <div class="col-md-3">
                          <input type="number" class="form-control" name="order_eng" placeholder="Type here .." value="{{ $data->order }}" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <a href="{{ route('admin.navigation-pages.index') }}" class="btn btn-warning btn-sm"><i class="ft ft-arrow-left"></i> Cancel</a>
                  <button type="submit" class="btn btn-info btn-sm"><i class="ft ft-save"></i> Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@section('js')
<script src="{{ asset('app-assets/vendors/js/editors/ckeditor/ckeditor.js?v=1') }}" type="text/javascript"></script>
<script type="text/javascript">
    var editor = CKEDITOR.instances['ckeditor'];
    if (editor) { editor.destroy(true); }
    CKEDITOR.replace('ckeditor', {
      height: '350px',
      extraPlugins: 'forms'
    });

    CKEDITOR.replace('ckeditor_eng', {
      height: '350px',
      extraPlugins: 'forms'
    });
</script>
@endsection

@endsection