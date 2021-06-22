@extends('layouts.app')
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
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                  </div>
                  <div class="form-group">
                    <label for="name">Tổng giá tiền</label>
                    <input type="number" name="total_price" class="form-control" placeholder="Enter giá">
                    <span class="text-danger">{{ $errors->first('total_price') }}</span>
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
        