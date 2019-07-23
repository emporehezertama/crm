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
            <li class="breadcrumb-item active">Pricelist
            </li>
          </ol>
        </div>
      </div>
    </div>
    
  </div>
  <div class="content-body">
    <form class="form form-horizontal" id="form-additem" method="POST" action="{{ route('price.store') }}" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Add New Item</h4>
            </div>
            <div class="card-content collapse show">
              <div class="card-body pt-0">
                <div class="form-body">
                <div class="row">
                  <div class="col-md-6">
                    <label class="label-control">Nama Item</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Typing here .." name="name[]" value="">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <label class="label-control">Price</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Typing here .." name="modul_price[]" value="">
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
              <div class="btn-group">
                <a href="javascript:void(0)" class="btn btn-round btn-info" onclick="submit_pricelist();"><i class="fa fa-plus"></i> Save Price List</a>
              </div>
            </div>
            <br>
        </div>
      </div>
    </form>
    <div class="col-md-6">
      <form class="form form-horizontal" id="form-updateitem" method="POST" action="{{ route('price.store') }}" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Price List Master</h4>
          </div>
          <div class="card-content collapse show">
            <div class="card-body pt-0">
                {{ csrf_field() }}
                
                <div class="form-body">
                  @foreach($data as $key => $item)
                  <div class="row">
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" placeholder="Typing here .." name="id[]" value="{{$item->price_id}}">
                      <input type="text" class="form-control" placeholder="Typing here .." name="name[]" value="{{$item->name}}">
                    </div>
                    <div class="col-md-6">
                      : <label class="label-control"><?php //echo "Rp ".number_format("test",0,".","."); ?></label>
                    </div>
                  </div>
                  <br>
                  @endforeach
                </div>
                
            </div>
          </div>
          <div class="content-header-right col-md-6 col-12">
            <div class="btn-group">
              <a href="javascript:void(0)" class="btn btn-round btn-info" onclick="updateItem();"><i class="fa fa-plus"></i> Update Price List</a>
            </div>
          </div>
          <br>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  function submit_pricelist()
  {
    $("#form-pricelist").submit();
  }
</script>
@endsection