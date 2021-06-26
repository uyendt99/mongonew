@extends('layouts.app')
@section('title')
Danh sách khách hàng
@endsection
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý khách hàng</li>
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
                <h3 class="card-title">Danh sách khách hàng</h3>
                <a href="{{ route('customer.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
              <!-- <div class="card-body">
              <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div> -->
              @if(count($customers) > 0)
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
                    <th style="width: 170px;">Hành động</th>
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
                          @foreach($rs->users as $user)
                            <p>{{$user->name}}</p>
                          @endforeach
                      </td>
                      <td>
                        <a href="{{route('customer.edit', $rs->id)}}" class="btn btn-warning btn_action"><i style="color:#fff;" class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('customer.delete', $rs->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger show_confirm btn_action" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <a href="{{route('customer.show', $rs->id)}}" class="btn btn-success"><i class="far fa-eye"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
              {{ $customers->links('pagination::bootstrap-4') }}
              </div>
              @else
              <div>
                <p style="text-align: center;">Không có dữ liệu</p>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection