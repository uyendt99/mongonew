@extends('layouts.app')
@section('content')
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm quyền mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="createPermission" class="form_validate" action="{{route('permission.store')}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tên quyền</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter tên quyền">
                    @if( $errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Tên hiển thị</label>
                    <input type="text" name="display_name" class="form-control" placeholder="Enter tên quyền hiển thị">
                    @if( $errors->has('display_name'))
                    <span class="text-danger">{{ $errors->first('display_name') }}</span>
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
        