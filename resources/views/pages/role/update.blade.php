@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('role')}}">Quản lý vai trò</a></li>
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
                <h3 class="card-title">Cập nhật vai trò</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="updateRole" class="form_validate" action="{{route('role.update',$role->id)}}" method="POST">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên vai trò</label>
                        <input type="text" name="name" value="{{old('name',$role->name)}}" class="form-control" placeholder="Enter tên vai trò">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="name">Quyền</label>
                        <select multiple="multiple" name="permission_ids[]" id="user-select" class="form-control multiple_select">
                            @foreach($permissions as $per)
                                <option value="{{$per->id}}" {{in_array($per->id, $role->permission_ids) ? "selected" : ''}}>{{$per->display_name}}</option>
                            @endforeach
                        </select>
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
