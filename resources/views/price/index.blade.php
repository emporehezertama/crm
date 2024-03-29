@extends('layouts.administrator')

@section('title', 'Pricelist')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Pricelist</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Pricelist</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
      <div class="btn-group">
        <a href="{{ route('price.create') }}" class="btn btn-round btn-info"><i class="ft ft-plus"></i> Update New Pricelist</a>
      </div>
    </div>
  </div>
  <div class="content-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="card-body mt-1 ">
              <div class="table-responsive">
                <table class="table ">
                  <thead>
                    <tr>
                      <th style="width: 50px;">#</th>
                      <th>Price Id</th>
                      <th>Created</th>
                      <th style="width: 45px;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $item)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                          {{ $item->id }}
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                          <form method="POST" action="{{ route('price.destroy', ['id' => $item->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="javascript:void(0)" class="text-danger" title="Delete data" onclick="confirm_delete('Hapus data ini ?', this)"><i class="la la-trash"></i></a>
                            <a href="{{ route('price.edit', ['id' => $item->id]) }}" title="Edit Data"><i class="la la-edit"></i></a>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="col-m-6 pull-left text-left">Showing  $data->firstItem()  to  $data->lastItem()  of  $data->total()  entries</div>
                <div class="col-md-6 pull-right text-right"> $data->appends($_GET)->render() </div><div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@section('js')
<script type="text/javascript">


</script>
@endsection