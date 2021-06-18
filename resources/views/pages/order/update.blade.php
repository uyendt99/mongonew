@extends('layouts.app')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật đơn hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="updateOrder" class="form_validate" action="{{route('order.update',$order->id)}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tên đơn hàng</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter tên" value="{{old('name',$order->name)}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Tổng giá tiền</label>
                    <input type="text" name="total_price" class="form-control" placeholder="Enter giá" value="{{old('total_price',$order->total_price)}}">
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
    </section>
    @endsection
        