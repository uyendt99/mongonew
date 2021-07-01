@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('customer')}}">Quản lý khách hàng</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa</li>
            </ol>
@endsection
@section('content')
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
                    <input type="text" name="name" class="form-control" placeholder="Tên" value="{{old('name', $customer->name)}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Tuổi</label>
                    <input type="number" name="age" class="form-control" placeholder="Tuổi" value="{{old('age',$customer->age)}}">
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
                    <label for="name">Số điện thoại</label>
                    <input type="text" name="phone" value="{{old('phone',$customer->phone)}}" class="form-control" placeholder="Số điện thoại">
                    @if( $errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" value="{{old('email',$customer->email)}}" class="form-control" placeholder="Email">
                    @if( $errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="{{old('address',$customer->address)}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Phân loại</label>
                    <select class="form-control multiple_select" id="classify-select" multiple="multiple" name="classify[]" id="">
                        @foreach($classifys as $item)
                        <option value="{{$item}}" @if(isset($customer->classify)) {{in_array($item, $customer->classify) ? "selected" : ''}} @endif >{{$item}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Nơi làm việc</label>
                        <select class="form-control" name="company_id" id="">
                            <option value="">Chọn nơi làm việc</option>
                            @foreach($companies as $com)
                                <option value="{{$com->id}}" @if(isset($customer->company_id)) {{($customer->company_id === $com->id) ? 'Selected' : ''}} @endif>{{$com->name}}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Nghề nghiệp</label>
                    <input type="text" name="job" class="form-control" placeholder="Nghề nghiệp" value="{{$customer->job}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Nhân viên chăm sóc</label>
                    <select multiple="multiple" name="user_ids[]" id="user-select" class="form-control multiple_select">
                        @foreach($users as $user)
                            <option value="{{$user->id}}" @if(isset($customer->user_ids)) {{in_array($user->id, $customer->user_ids) ? "selected" : ''}} @endif >{{$user->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Đơn hàng</label>
                    <select multiple="multiple" name="order_ids[]" class="form-control multiple_select">
                        @foreach($orders as $order)
                            <option value="{{$order->id}}" @if(isset($customer->order_ids)){{in_array($order->id, $customer->order_ids) ? "selected" : ''}} @endif>{{$order->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Xác nhận</button>
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
        