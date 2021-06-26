@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý đơn hàng</li>
            </ol>
@endsection
@section('content')
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
                <h3 class="card-title">Danh sách đơn hàng</h3>
                <a href="{{ route('order.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
              @if(count($orders) > 0)
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tên đơn hàng</th>
                      <th>Tổng tiền</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $order)
                    <tr>
                      <td>{{$order->name}}</td>
                      <td>{{$order->total_price}} VNĐ</td>
                      <td>
                        <a href="{{route('order.edit', $order->id)}}" class="btn btn-warning btn_action"><i style="color:#fff;" class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('order.delete', $order->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger show_confirm" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
              {{ $orders->links('pagination::bootstrap-4') }}
              </div>
              @else
              <div>
                <p style="text-align: center;">Không có dữ liệu</p>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    
@endsection
