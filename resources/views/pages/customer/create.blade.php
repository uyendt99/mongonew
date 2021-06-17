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
                <h3 class="card-title">Thêm khách hàng mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{route('customer.store')}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tên khách hàng</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter tên">
                  </div>
                  <div class="form-group">
                    <label for="name">Tuổi</label>
                    <input type="number" name="age" class="form-control" placeholder="Enter tuổi">
                  </div>
                  <div class="form-group">
                    <label for="name">Giới tính</label>
                    <div>
                        <input type="radio" name="gender" value="0"> Nam
                        <input style="margin-left:20px;" type="radio" name="gender" value="1"> Nữ
                        <input style="margin-left:20px;" type="radio" name="gender" value="2"> Khác
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter địa chỉ">
                  </div>
                  <div class="form-group">
                    <label for="name">Phân loại</label>
                    <select class="form-control multiple_select" multiple="multiple" name="classify[]" id="">
                        <option value="">Chọn loại khách hàng</option>
                        @foreach($classifys as $class)
                            <option value="{{$class}}">{{$class}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Nơi làm việc</label>
                        <select class="form-control" name="company_id" id="">
                            <option value="">Chọn nơi làm việc</option>
                            @foreach($companies as $com)
                                <option value="{{$com->id}}">{{$com->name}}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Nghề nghiệp</label>
                    <input type="text" name="job" class="form-control" placeholder="Enter nghề nghiệp">
                  </div>
                  <div class="form-group">
                    <label for="name">Nhân viên chăm sóc</label>
                    <select multiple="multiple" name="user_ids[]" id="user-select" class="form-control multiple_select">
                        <option value="">Chọn nhân viên chăm sóc</option>
                        @foreach($users as $user)
                            <option value="{{$user->username}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Đơn hàng</label>
                    <select multiple="multiple" name="order_ids[]" class="form-control multiple_select">
                        @foreach($orders as $order)
                            <option value="{{$order->id}}">{{$order->name}}</option>
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
        