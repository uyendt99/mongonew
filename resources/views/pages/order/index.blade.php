@extends('layouts.app')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              @if ($message = Session::get('success'))
               <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
               </div>
               <br>
               @endif
                <h3 class="card-title">Order</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div> -->
                <a href="{{ route('order.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right">Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Tên đơn hàng</th>
                      <th>Tổng tiền</th>
                      <th colspan="3">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $order)
                    <tr>
                      <td>{{$order->name}}</td>
                      <td>{{$order->total_price}} VNĐ</td>
                      
                      <td><a href="{{route('order.edit', $order->id)}}" class="btn btn-warning">Edit</a></td>
                      <td>
                        <form action="{{route('order.delete', $order->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger show_confirm" type="submit">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection