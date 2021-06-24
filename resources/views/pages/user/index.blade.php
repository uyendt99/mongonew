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
                <a href="{{ route('user.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
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
                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning btn_action"><i style="color:#fff;" class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('user.delete', $user->id)}}" method="post">
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
              {{ $users->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
