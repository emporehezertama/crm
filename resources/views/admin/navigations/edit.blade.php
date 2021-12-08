@extends('layouts.administrator')

@section('title', 'Navigations /  Menu')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Navigations /  Menu</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Navigations /  Menu</li>
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
              <form class="form form-horizontal" method="POST" action="{{ route('admin.navigations.update', ['id' => $data->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-body">
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Parent Navigation</label>
                    </div>
                    <div class="col-md-5">
                      <select class="form-control" name="parent_navigation_id">
                        <option value="0">Please Select</option>
                        {!! navigation_select_form($data->parent_navigation_id) !!}
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Title</label>
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control referrer" name="title" data-referral="permalink" placeholder="Type here .." value="{{ $data->title }}" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Permalink</label>
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control permalink" name="permalink" readonly="true" placeholder="Type here .." value="{{ $data->permalink }}" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Hash URL</label>
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control" name="hash_url" placeholder="Type here .." value="{{ $data->hash_url }}" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Description</label>
                    </div>
                    <div class="col-md-5">
                      <textarea class="form-control" name="description" placeholder="Type here .." value="{{ $data->description }}" style="height: 100px;"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-3 float-left">
                      <label class="label-control">Order</label>
                    </div>
                    <div class="col-md-2 float-left">
                      <label class="label-control">Status</label>
                    </div><div class="clearfix"></div>
                    <div class="col-md-3 float-left">
                      <input type="number" class="form-control" name="order" placeholder="Type here .." value="{{ $data->order }}" />
                    </div>
                    <div class="col-md-2 float-left">
                      <select class="form-control" name="status">
                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>
                      </select>
                    </div><div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Position</label>
                    </div>
                    <div class="col-md-5">
                      <p>
                        <label class="mr-2">
                          <input type="checkbox" name="position_top_menu" value="1" {{ $data->position_top_menu == 1 ? 'checked' : '' }} /> Top Menu
                        </label>
                        <label class="mr-2">
                          <input type="checkbox" name="position_main_menu" value="1" {{ $data->position_main_menu == 1 ? 'checked' : '' }} /> Main Menu
                        </label>
                        <label>
                          <input type="checkbox" name="position_footer_menu" value="1" {{ $data->position_footer_menu == 1 ? 'checked' : '' }} /> Footer Menu
                        </label>
                      </p>
                    </div>
                  </div>

                  <div class="form-actions">
                    <a href="{{ route('admin.navigations.index') }}" class="btn btn-warning btn-sm"><i class="ft ft-arrow-left"></i> Cancel</a>
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
<script type="text/javascript">
  
  $("input[name='permalink']").on('click', function(){
    generate_permalink();
  });
  $("input[name='title']").on('input', function(){
    generate_permalink();
  });
  
</script>
@endsection
@endsection