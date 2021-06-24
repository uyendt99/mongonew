@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('company')}}">Quản lý công ty</a></li>
              <li class="breadcrumb-item active">Thêm</li>
            </ol>
@endsection
@section('content')
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm công ty mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="createCompany" class="form_validate" action="{{route('company.store')}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tên công ty</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter tên công ty">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    @endsection
        