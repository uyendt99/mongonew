@extends('layouts.app')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Company</h3>

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
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($customers as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->age}}</td>
                      <td>{{$item->gender == 1 ? "Nữ" : "Nam"}}</td>
                      <td>{{$item->address}}</td>
                      <td>
                        
                      </td>
                      <td>{{$item->company->name}}</td>
                      <td>{{$item->job}}</td>
                      <td><a href="{{action('CompanyController@edit', $item->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                        <form action="{{action('CompanyController@destroy', $item->id)}}" method="post">
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