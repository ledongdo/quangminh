@extends('layouts.admin')
@section('title')
<title>Product add</title>
@endsection

@section('css')
<link href="{{asset('admins/product/add/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/edit/edit.css')}}" rel="stylesheet" />
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
        <form action="{{route('products.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <div class="form-group">
                <label >Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" 
                value="{{$product->name}}" placeholder="Nhâp tên sản phẩm">
            </div>
            <div class="form-group">
                <label >Giá</label>
                <input type="text" name="price" class="form-control" 
                value="{{$product->price}}" placeholder="Nhâp giá sản phẩm">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="">Chọn danh mục cha</label>
                <select class="form-control" name="category_id">
                    <option value="0">Chọn danh mục cha</option>
                    {!!$htmlOption!!}
                </select>
            </div>
            <div class="form-group ">
                <label >Ảnh đại diện</label>
                <input type="file" name="feature_image_path"  class="form-control-file">
                <div class="col-md-12 contariner_image">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="img_product_edit" src="{{$product->feature_image_path}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group " >
                <label >Ảnh chi tiết</label>
                <input type="file" name="image_path[]"
                multiple  class="form-control-file">
                <div class="col-md-12 contariner_image_detail">
                    <div class="row">
                        @foreach($product->images as $productItem)
                        <div class="col-md-3">
                            <img class="img_product_edit" src="{{$productItem->image_path}}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group" >
                <label >Tag</label>
                <select class="form-control select_2" name="tags[]" multiple="multiple">
                    @foreach($product->tags as $tagItem)
                    <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nhập nội dung</label>
                <textarea class="form-control" placeholder="Nhập nội dung" name="content" rows="3">
                    {{$product->content}}
                </textarea>
            </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        
        </div>
      </div>
    </div>
  </div>
  @endsection