@extends('layouts.app')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm vai trò mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="createRole" class="form_validate" action="{{route('role.store')}}" method="POST">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên vai trò</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter tên vai trò">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="name">Quyền</label>
                        <select multiple="multiple" name="permission_ids[]" id="user-select" class="form-control multiple_select">
                            @foreach($permissions as $per)
                                <option value="{{$per->id}}">{{$per->name}}</option>
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
</section>
 @endsection
