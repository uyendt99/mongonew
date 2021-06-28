@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item">Quản lý quyền</li>
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
                <h3 class="card-title">Danh sách vai trò</h3>
                <a href="{{ route('role.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right">Thêm</a>
              </div>
              <!-- /.card-header -->
              @if(count($roles) > 0)
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tên vai trò</th>
                      <th>Quyền</th>
                      <th style="width:120px;">Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($roles as $role)
                    <tr>
                      <td>{{$role->name}}</td>
                      <td>
                      @if(count($role->permissions)>0)
                        @foreach($role->permissions as $permission)
                             <span class="badge badge-success">{{$permission->display_name}}</span>
                        @endforeach
                      @else
                        <span class="badge badge-danger">No permission</span>
                      @endif
                      </td>
                      <td>
                      <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu drop_custom">
                            <a class="dropdown-item" href="{{route('role.edit', $role->id)}}">Sửa</a>
                            <form action="{{route('role.delete', $role->id)}}" method="post">
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
              {{ $roles->links('pagination::bootstrap-4') }}
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
