@extends('layouts.administrator')

@section('title', 'User')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">User</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">User
            </li>
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
              <form class="form form-horizontal" method="POST" action="{{ route('admin.users.store') }}">
                {{ csrf_field() }}
                <div class="form-body">
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Name</label>
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Email</label>
                    </div>
                    <div class="col-md-5">
                      <input type="email" class="form-control" name="email" placeholder="Email" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">User Access</label>
                    </div>
                    <div class="col-md-5">
                      <select class="form-control" name="user_access_id">
                        @foreach(user_access() as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Password</label>
                    </div>
                    <div class="col-md-5">
                      <input type="password" class="form-control" name="password" placeholder="Password" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="label-control">Status</label>
                    </div>
                    <div class="col-md-5">
                      <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="1">Inactive</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-actions">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-warning btn-sm"><i class="ft ft-arrow-left"></i> Cancel</a>
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