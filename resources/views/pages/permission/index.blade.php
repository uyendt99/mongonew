@extends('layouts.app')
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
                <h3 class="card-title">Order</h3>
                <a href="{{ route('permission.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right" style="margin-left:10px;">Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tên hiển thị</th>
                      <th>Tên quyền</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($permissions as $per)
                    <tr>
                      <td>{{$per->display_name}}</td>
                      <td>{{$per->name}}</td>
                      <td><a href="{{route('permission.edit', $per->id)}}" class="btn btn-warning">Edit</a></td>
                      <td>
                        <form action="{{route('permission.delete', $per->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger show_confirm" type="submit">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
              {{ $permissions->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
