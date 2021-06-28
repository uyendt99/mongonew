@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('customer')}}">Quản lý khách hàng</a></li>
              <li class="breadcrumb-item active">Thêm</li>
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
                <h3 class="card-title">Thêm khách hàng mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="createCustomer" class="form_validate" action="{{route('customer.store')}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tên khách hàng <span class="error_req">*</span></label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Tên">
                    @if( $errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Tuổi <span class="error_req">*</span></label>
                    <input type="text" name="age" value="{{old('age')}}" class="form-control" placeholder="Tuổi">
                    @if( $errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Giới tính <span class="error_req">*</span></label>
                    <div class="radio_gender">
                        <input type="radio" name="gender" value="0"> Nam
                        <input style="margin-left:20px;" type="radio" name="gender" value="1"> Nữ
                        <input style="margin-left:20px;" type="radio" name="gender" value="2"> Khác
                    </div>
                    @if( $errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Số điện thoại <span class="error_req">*</span></label>
                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Số điện thoại">
                    @if( $errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Email <span class="error_req">*</span></label>
                    <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                    @if( $errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Địa chỉ <span class="error_req">*</span></label>
                    <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Địa chỉ">
                    @if( $errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Phân loại <span class="error_req">*</span></label>
                    <select class="form-control multiple_select" multiple="multiple" name="classify[]" id="">
                        @foreach($classifys as $class)
                            <option value="{{$class}}">{{$class}}</option>
                        @endforeach
                    </select>
                    @if( $errors->has('classify'))
                    <span class="text-danger">{{ $errors->first('classify') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Nơi làm việc <span class="error_req">*</span></label>
                        <select class="form-control" name="company_id" id="">
                            <option value="">Chọn nơi làm việc</option>
                            @foreach($companies as $com)
                                <option value="{{$com->id}}">{{$com->name}}</option>
                            @endforeach
                        </select>
                    @if( $errors->has('company_id'))
                    <span class="text-danger">{{ $errors->first('company_id') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Nghề nghiệp <span class="error_req">*</span></label>
                    <input type="text" name="job" value="{{old('job')}}" class="form-control" placeholder="Nghề nghiệp">
                    @if( $errors->has('job'))
                    <span class="text-danger">{{ $errors->first('job') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Nhân viên chăm sóc <span class="error_req">*</span></label>
                    <select multiple="multiple" name="user_ids[]" id="user-select" class="form-control multiple_select">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    @if( $errors->has('user_ids'))
                    <span class="text-danger">{{ $errors->first('user_ids') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Đơn hàng</label>
                    <select multiple="multiple" name="order_ids[]" class="form-control multiple_select">
                        @foreach($orders as $order)
                            <option value="{{$order->id}}">{{$order->name}}</option>
                        @endforeach
                    </select>
                    @if( $errors->has('order_ids'))
                    <span class="text-danger">{{ $errors->first('order_ids') }}</span>
                    @endif
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Lưu lại</button>
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
        