@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('permission')}}">Quản lý quyền</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa</li>
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
                <h3 class="card-title">Cập nhật quyền</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="updatePermission" class="form_validate" action="{{route('permission.update',$permission->id)}}" method="POST">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label for="name">Tên hiển thị</label>
                    <input type="text" name="display_name" value="{{old('display_name',$permission->display_name)}}" class="form-control" placeholder="Tên quyền hiển thị">
                    @if( $errors->has('display_name'))
                    <span class="text-danger">{{ $errors->first('display_name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Tên quyền</label>
                    <input type="text" name="name" value="{{old('name',$permission->name)}}" class="form-control" placeholder="Tên quyền">
                    @if( $errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Xác nhận</button>
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
        