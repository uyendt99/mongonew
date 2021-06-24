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
                <a href="{{ route('role.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
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
                        <a href="{{route('role.edit', $role->id)}}" class="btn btn-warning btn_action"><i style="color:#fff;" class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('role.delete', $role->id)}}" method="post">
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
              {{ $roles->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
