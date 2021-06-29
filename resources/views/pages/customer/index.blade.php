@extends('layouts.app')
@section('title')
Danh sách khách hàng
@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-left">
  <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
  <li class="breadcrumb-item active">Quản lý khách hàng</li>
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
          <h3 class="card-title">Danh sách khách hàng</h3>
          <div class="btn-group float-right">
            <button type="button" class="btn btn-info">Khác</button>
            <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="{{ route('export.customer') }}">Export</a>
              <button class="dropdown-item import_data" data-toggle="modal" data-target="#importCustomer">Import</button>
              <button class="dropdown-item" data-toggle="modal" data-target="#deleteAllCustomer">Xóa các bản ghi</button>
            </div>
            <a href="{{ route('customer.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right" style="margin-left:10px;">Thêm</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            @if(count($customers) > 0)
            <div class="row">
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th><input type="checkbox" id="checkAll"></th>
                      <th>Tên</th>
                      <th>Tuổi</th>
                      <th>Giới tính</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                      <th>Địa chỉ</th>
                      <th>Phân loại</th>
                      <th>Nơi làm việc</th>
                      <th>Nghề nghiệp</th>
                      <th>Nhân viên chăm sóc</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($customers as $rs)
                    <tr>
                      <td><input type="checkbox" name="customer_ids[]" value="{{$rs->id}}"></td>
                      <td>{{$rs->name}}</td>
                      <td>{{$rs->age}}</td>
                      <td>@if($rs->gender == 1) Nữ @elseif($rs->gender == 0) Nam @else Khác @endif</td>
                      <td>{{$rs->phone}}</td>
                      <td>{{$rs->email}}</td>
                      <td>{{$rs->address}}</td>
                      <td>
                        @foreach ($rs->classify as $classify)
                        <p>{{$classify}}</p>
                        @endforeach
                      </td>
                      <td>{{$rs->company->name}}</td>
                      <td>{{$rs->job}}</td>
                      <td>
                        @foreach($rs->users as $user)
                        <p>{{$user->name}}</p>
                        @endforeach
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu drop_custom">
                            <a class="dropdown-item" href="{{route('customer.edit', $rs->id)}}">Sửa</a>
                            <form action="{{route('customer.delete', $rs->id)}}" method="post">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="dropdown-item show_confirm btn_action" type="submit">Xóa</button>
                            </form>
                            <a class="dropdown-item" href="{{route('customer.show', $rs->id)}}">Chi tiết</a>
                          </div>
                        </div>
                        <!-- <a href="{{route('customer.edit', $rs->id)}}" class="btn btn-warning btn_action"><i style="color:#fff;" class="fas fa-pencil-alt"></i></a>
                              <form action="{{route('customer.delete', $rs->id)}}" method="post">
                                  @csrf
                                  <input name="_method" type="hidden" value="DELETE">
                                  <button class="btn btn-danger show_confirm btn_action" type="submit"><i class="fas fa-trash-alt"></i></button>
                              </form>
                              <a href="{{route('customer.show', $rs->id)}}" class="btn btn-success"><i class="far fa-eye"></i></a> -->
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>

                  </tfoot>
                </table>
              </div>
            </div>

            @else
            <div>
              <p style="text-align: center;">Không có dữ liệu</p>
            </div>
            @endif
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</div><!-- /.container-fluid -->
<div class="modal fade" id="importCustomer" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Body -->
      <div class="modal-body">
        <div>
          Import Order
        </div>
        <form action="{{ route('import.customer') }}" id="import" class="form_validate" method="POST" enctype="multipart/form-data">
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
</div>
<div class="modal" tabindex="-1" role="dialog" id="deleteAllCustomer">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Dữ liệu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nhập xác nhận:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Xác nhận</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection