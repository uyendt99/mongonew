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
                <div class="btn-group float-right">
                    <button type="button" class="btn btn-info">Khác</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="{{ route('export.order') }}">Export</a>
                      <a class="dropdown-item import_data" data-toggle="modal" data-target="#importOrder">Import</a>
                  </div>
                <a href="{{ route('order.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right" style="margin-left:10px;">Thêm</a>
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
                      <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu drop_custom">
                            <a class="dropdown-item" href="{{route('order.edit', $order->id)}}">Sửa</a>
                            <form action="{{route('order.delete', $order->id)}}" method="post">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="dropdown-item show_confirm btn_action" type="submit">Xóa</button>
                            </form>
                          </div>
                        </div>
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
      <div class="modal fade" id="importOrder" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
                  <!-- Modal Body -->
            <div class="modal-body">
                <div>
                    Import Order
                </div>
                <form action="{{ route('import.order') }}" id="import" class="form_validate" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    @if ($errors->any())
                            <ul style="margin-bottom: 0px;">
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                    @endif
                    <br>
                    <button class="btn btn-success">Import</button>
                </form> 
            </div>
        </div>
    </div>
@endsection
