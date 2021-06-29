@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb float-sm-left">
  <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
  <li class="breadcrumb-item active">Quản lý tài khoản</li>
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
          <h3 class="card-title">Danh sách tài khoản</h3>
          <a href="{{ route('user.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right">Thêm</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            @if(count($users) > 0)
            <div class="row">
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>Tên</th>
                      <th>Tên đăng nhập</th>
                      <th>Email</th>
                      <th>Vai trò</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                        @foreach($user->roles as $role)
                        <span class="badge badge-success">{{$role->name}}</span>
                        @endforeach
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu drop_custom">
                            <a class="dropdown-item" href="{{route('user.edit', $user->id)}}">Sửa</a>
                            <form action="{{route('user.delete', $user->id)}}" method="post">
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
      </div>
    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection