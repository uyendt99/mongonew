@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('user')}}">Quản lý tài khoản</a></li>
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
                <h3 class="card-title">Thêm tài khoản mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="createUser" class="form_validate" action="{{route('user.store')}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter tên">
                    @if( $errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif

                  </div>
                  <div class="form-group">
                    <label for="name">Tên đăng nhập</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter tên đăng nhập">
                    @if( $errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter email">
                    @if( $errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Enter password">
                    @if( $errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Vai trò</label>
                    <select multiple="multiple" name="role_ids[]" id="user-select" class="form-control multiple_select">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    @if( $errors->has('role_ids'))
                    <span class="text-danger">{{ $errors->first('role_ids') }}</span>
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
