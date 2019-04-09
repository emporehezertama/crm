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
              <form class="form form-horizontal" method="POST" action="{{ route('admin.product.store') }}">
                {{ csrf_field() }}
                <div class="form-body">
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Product</label>
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control" placeholder="Product" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Description</label>
                    </div>
                    <div class="col-md-5">
                      <textarea class="form-control" name="description" style="height: 150px;" placeholder="Typing here .."></textarea>
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