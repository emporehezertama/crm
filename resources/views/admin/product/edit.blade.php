@extends('layouts.administrator')

@section('title', 'Product')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Product</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
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
              <form class="form form-horizontal" method="POST" action="{{ route('admin.product.update', ['id' => $data->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-body">
                  @if($data->parent_id != NULL)
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Parent</label>
                    </div>
                    <div class="col-md-5">
                      <select class="form-control" name="parent_id">
                          <option value=""> Select Parent </option>
                          @foreach(list_parent() as $item)
                          <option value="{{ $item->id }}" {{ $data->parent_id == $item->id ? 'selected' : '' }} >{{ $item->name }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  @endif
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Product</label>
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control" placeholder="Product" name="name" value="{{ $data->name }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">User Limit?</label>
                    </div>
                    <div class="col-md-5">
                      <label><input type="checkbox" name="user_limit" style="margin-right: 10px" value="1" {{ $data->user_limit == 1 ? 'checked' : '' }} >Yes</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Description</label>
                    </div>
                    <div class="col-md-5">
                      <textarea class="form-control" name="description" style="height: 150px;" placeholder="Typing here .." value="{{ $data->description }}"></textarea>
                    </div>
                  </div>
                  <div class="form-actions">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-warning btn-sm"><i class="ft ft-arrow-left"></i> Cancel</a>
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
@endsection