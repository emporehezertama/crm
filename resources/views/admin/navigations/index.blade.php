@extends('layouts.administrator')

@section('title', 'Navigations / Menu')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Navigations / Menu</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Navigations / Menu</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
      <div class="btn-group">
        <a href="{{ route('admin.navigations.create') }}" class="btn btn-round btn-info"><i class="ft ft-plus"></i> Navigation / Menu</a>
      </div>
    </div>
  </div>
  <div class="content-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="card-body pt-1 pl-1 pr-1 ">
              <div class="table-responsive">
                <table class="table table-striped table-bordered data-table">
                  <thead>
                    <tr>
                      <th style="width: 50px;">#</th>
                      <th>Title</th>
                      <th>Permalink</th>
                      <th>Description</th>
                      <th>Order</th>
                      <th>Created</th>
                      <th style="width: 45px;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(navigations_array() as $key => $item)
                      <tr>
                        <td>{!! $item->no !!}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->permalink }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->order }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                          <form method="POST" action="{{ route('admin.navigations.destroy', $item->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="javascript:void(0)" class="text-danger" title="Delete data" onclick="confirm_delete('Hapus data ini ?', this)"><i class="la la-trash"></i></a>
                            <a href="{{ route('admin.navigations.edit', $item->id) }}" title="Edit Data"><i class="la la-edit"></i></a>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="col-m-6 pull-left text-left">Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries</div>
                <div class="col-md-6 pull-right text-right">{{ $data->appends($_GET)->render() }}</div><div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection