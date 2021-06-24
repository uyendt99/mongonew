@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('order')}}">Quản lý đơn hàng</a></li>
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
                <h3 class="card-title">Thêm đơn hàng mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="createOrder" class="form_validate" action="{{route('order.store')}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tên đơn hàng</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter tên đơn hàng">
                    @if( $errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Tổng giá tiền</label>
                    <input type="number" name="total_price" class="form-control" placeholder="Enter giá">
                    @if( $errors->has('total_price'))
                    <span class="text-danger">{{ $errors->first('total_price') }}</span>
                    @endif
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
        