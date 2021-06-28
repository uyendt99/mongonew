@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('user')}}">Quản lý tài khoản</a></li>
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
                <h3 class="card-title">Cập nhật tài khoản</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="updateUser" class="form_validate" action="{{route('user.update',$user->id)}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control" placeholder="Tên">
                    @if( $errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Tên đăng nhập</label>
                    <input type="text" name="username" value="{{old('username',$user->username)}}" class="form-control" placeholder="Tên đăng nhập">
                    @if( $errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" value="{{old('email',$user->email)}}" class="form-control" placeholder="Email">
                    @if( $errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Vai trò</label>
                    <select multiple="multiple" name="role_ids[]" id="user-select" class="form-control multiple_select">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if(isset($user->role_ids)) {{in_array($role->id, $user->role_ids) ? "selected" : ''}} @endif>{{$role->name}}</option>
                        @endforeach
                    </select>
                    @if( $errors->has('role_ids'))
                    <span class="text-danger">{{ $errors->first('role_ids') }}</span>
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
