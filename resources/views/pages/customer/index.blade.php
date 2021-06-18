@extends('layouts.app')
@section('content')
<section class="content">
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
                <h3 class="card-title">Customer</h3>
                <a href="{{ route('customer.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right" style="margin-left:10px;">Add</a>
                <a class="btn btn-warning float-right" href="{{ route('export.customer') }}" style="margin-left:10px;">Export</a>
                <button type="submit"  class="btn btn-success float-right" data-toggle="modal" data-target="#myModalHorizontal">Import</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                  <thead>
                  <tr>
                    <th>Tên</th>
                    <th>Tuổi</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Phân loại</th>
                    <th>Nơi làm việc</th>
                    <th>Nghề nghiệp</th>
                    <th>Nhân viên chăm sóc</th>
                    <th colspan="3">Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($customers as $rs)
                    <tr>
                      <td>{{$rs->name}}</td>
                      <td>{{$rs->age}}</td>
                      <td>@if($rs->gender == 1) Nữ  @elseif($rs->gender == 0) Nam @else Khác @endif</td>
                      <td>{{$rs->address}}</td>
                      <td>
                        @foreach ($rs->classify as $classify)
                          <p>{{$classify}}</p>
                        @endforeach
                      </td>
                      <td>{{$rs->company->name}}</td>
                      <td>{{$rs->job}}</td>
                      <td>
                          @foreach($users as $user)
                            {{$user->username}}
                          @endforeach
                      </td>
                      <td>
                      <td><a href="{{route('customer.edit', $rs->id)}}" class="btn btn-warning">Edit</a></td>
                      <td>
                        <form action="{{route('customer.delete', $rs->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger show_confirm" type="submit">Delete</button>
                        </form>
                      </td>
                      <td><a href="{{route('customer.show', $rs->id)}}" class="btn btn-success">Show</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
              {{ $customers->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
                  <!-- Modal Body -->
            <div class="modal-body">
                <div>
                    Import Order
                </div>
                <form action="{{ route('import.customer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import</button>
                </form> 
            </div>
        </div>
    </div>
@endsection