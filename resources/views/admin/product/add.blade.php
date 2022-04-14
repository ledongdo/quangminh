@extends('layouts.admin')
@section('title')
<title>Product add</title>
@endsection

@section('css')
<link href="{{asset('admins/product/add/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{asset('admins/product/add/select2.min.js')}}"></script>
<script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name' => 'Product','key'=>'Add'  ])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <div class="form-group">
                <label >Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" 
                placeholder="Nhâp tên sản phẩm">
            </div>
            <div class="form-group">
                <label >Giá</label>
                <input type="text" name="price" class="form-control" 
                placeholder="Nhâp giá sản phẩm">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="">Chọn danh mục cha</label>
                <select class="form-control" name="category_idphp">
                    <option value="0">Chọn danh mục cha</option>
                    {!!$htmlOption!!}
                </select>
            </div>
            <div class="form-group">
                <label >Ảnh đại diện</label>
                <input type="file" name="feature_image_path"  class="form-control-file">
            </div>
            <div class="form-group" >
                <label >Ảnh chi tiết</label>
                <input type="file" name="image_path[]"
                multiple  class="form-control-file">
            </div>
            <div class="form-group" >
                <label >Tag</label>
                <select class="form-control select_2" name="tags[]" multiple="multiple">
                </select>
            </div>
            <div class="form-group">
                <label>Nhập nội dung</label>
                <textarea class="form-control" placeholder="Nhập nội dung" name="content" rows="3"></textarea>
            </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        
        </div>
      </div>
    </div>
  </div>
  @endsection