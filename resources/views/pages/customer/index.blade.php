@extends('layouts.app')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customer</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div> -->
                <a href="{{ route('customer.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right">Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên</th>
                      <th>Tuổi</th>
                      <th>Giới tính</th>
                      <th>Địa chỉ</th>
                      <th>Phân loại</th>
                      <th>Nơi làm việc</th>
                      <th>Nghề nghiệp</th>
                      <th>Nhân viên chăm sóc</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($customers as $rs)
                    <tr>
                      <td>{{$rs->id}}</td>
                      <td>{{$rs->name}}</td>
                      <td>{{$rs->age}}</td>
                      <td>{{$rs->gender == 1 ? "Nữ" : "Nam"}}</td>
                      <td>{{$rs->address}}</td>
                      <td>
                        @foreach ($rs->classify as $classify)
                          <p>{{$classify}}</p>
                        @endforeach
                      </td>
                      <td>{{$rs->company->name}}</td>
                      <td>{{$rs->job}}</td>
                      <td>
                        @foreach ($rs->user_ids as $user)
                          <p>{{$user}}</p>
                        @endforeach
                      </td>
                      <td><a href="{{action('CustomerController@edit', $rs->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                        <form action="{{action('CustomerController@destroy', $rs->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection