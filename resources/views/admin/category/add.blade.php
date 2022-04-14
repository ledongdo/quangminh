@extends('layouts.admin')
@section('title')
<title>Category add</title>
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name' => 'Category','key'=>'Add'  ])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <form action="{{route('categories.store')}}" method="POST">
          @csrf
          <div class="col-md-6">
            <div class="form-group">
                <label >Tên danh mục</label>
                <input type="text" name="name" class="form-control" 
                placeholder="Nhâp tên danh mục">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="">Chọn danh mục cha</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Chọn danh mục cha</option>
                    {!!$htmlOption!!}
                </select>
            </div>
          </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        
        </div>
      </div>
    </div>
  </div>
  @endsection