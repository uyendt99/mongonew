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
                <h3 class="card-title">Vai trò</h3>
                <a href="{{ route('role.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right" style="margin-left:10px;">Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tên vai trò</th>
                      <th>Quyền</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($roles as $role)
                    <tr>
                      <td>{{$role->name}}</td>
                      <td>
                        @foreach($role->permissions as $per)
                        <span style="border-radius:2px;background: green;color:#fff;padding:3px 5px;">{{$per->display_name}}</span>
                        @endforeach
                      </td>
                      <td><a href="{{route('role.edit', $role->id)}}" class="btn btn-warning">Edit</a></td>
                      <td>
                        <form action="{{route('role.delete', $role->id)}}" method="post">
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
              {{ $roles->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
