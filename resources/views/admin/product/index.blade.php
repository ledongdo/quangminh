@extends('layouts.admin')
@section('title')
<title>Trang chu</title>
@endsection
@section('content')
@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
@endsection


<div class="content-wrapper">
@include('partials.content-header',['name' => 'Product','key'=>'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('products.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{number_format($product->price)}}</td>
                <td>
                    <img class="img_product" src="{{$product->feature_image_path}}" alt="">
                </td>
                <td>{{optional($product->category)->name}}</td>
                <td>
                  <a href="{{route('products.edit',['id'=>$product->id])}}" class="btn btn-success">edit</a>
                  <a href="{{route('products.delete',['id'=>$product->id])}}" class="btn btn-danger">delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
          <div class="col-md-4">
          {{$products->appends(Request()->all())->links()}}
          </div>

          
          
        
        </div>
      </div>
    </div>
  </div>
  @endsection