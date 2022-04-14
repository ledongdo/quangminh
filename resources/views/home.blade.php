@extends('layouts.admin')
@section('title')
<title>Trang chu</title>
@endsection
@section('content')

<div class="content-wrapper">
@include('partials.content-header',['name' => 'helo','key'=>'Admin'  ])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection