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
                <h3 class="card-title">Cập nhật thông tin khách hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="updateCustomer" class="form_validate" action="{{route('customer.update',$customer->id)}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tên khách hàng</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter tên" value="{{old('name', $customer->name)}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Tuổi</label>
                    <input type="number" name="age" class="form-control" placeholder="Enter tuổi" value="{{old('age',$customer->age)}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Giới tính</label>
                    <div>
                        <input type="radio" name="gender" value="0" {{ ($customer->gender=="0")? "checked" : "" }}> Nam
                        <input style="margin-left:20px;" type="radio" name="gender" value="1" {{ ($customer->gender=="1")? "checked" : "" }}> Nữ
                        <input style="margin-left:20px;" type="radio" name="gender" value="2" {{ ($customer->gender=="2")? "checked" : "" }}> Khác
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter địa chỉ" value="{{old('address',$customer->address)}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Phân loại</label>
                    <select class="form-control multiple_select" id="classify-select" multiple="multiple" name="classify[]" id="">
                        @foreach($classifys as $item)
                        <option value="{{$item}}" {{in_array($item, $customer->classify) ? "selected" : ''}} >{{$item}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Nơi làm việc</label>
                        <select class="form-control" name="company_id" id="">
                            <option value="">Chọn nơi làm việc</option>
                            @foreach($companies as $com)
                                <option value="{{$com->id}}" {{($customer->company_id === $com->id) ? 'Selected' : ''}}>{{$com->name}}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Nghề nghiệp</label>
                    <input type="text" name="job" class="form-control" placeholder="Enter nghề nghiệp" value="{{$customer->job}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Nhân viên chăm sóc</label>
                    <select multiple="multiple" name="user_ids[]" id="user-select" class="form-control multiple_select">
                        @foreach($users as $user)
                            <option value="{{$user->id}}" {{in_array($user->id, $customer->user_ids) ? "selected" : ''}} >{{$user->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Đơn hàng</label>
                    <select multiple="multiple" name="order_ids[]" class="form-control multiple_select">
                        @foreach($orders as $order)
                            <option value="{{$order->id}}" {{in_array($order->id, $customer->order_ids) ? "selected" : ''}}>{{$order->name}}</option>
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
        