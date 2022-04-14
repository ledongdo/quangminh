@extends('layouts.admin')
@section('title')
<title>Menu edit</title>
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name' => 'Menu','key'=>'Edit'  ])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <form action="{{route('menus.update',['id'=>$menu->id])}}" method="POST">
          @csrf
          <div class="col-md-6">
            <div class="form-group">
                <label >Tên menu</label>
                <input type="text" name="name" class="form-control" 
                value="{{$menu->name}}"    placeholder="Nhâp tên danh mục">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="">Chọn danh mục cha</label>
                <select class="form-control" name="parent_id">
                    <option selected value="0">Chọn danh mục cha</option>
                    {!!$optionSelect!!}
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