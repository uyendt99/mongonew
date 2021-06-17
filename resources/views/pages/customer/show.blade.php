@extends('layouts.app')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin khách hàng {{$customer->name}}</h3>
              </div>
              <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-12 invoice-col">
                            <p><strong>Tên: </strong>{{$customer->name}}</p>
                            <p><strong>Tuổi: </strong>{{$customer->age}}</p>
                            <p><strong>Giới tính: </strong>{{$customer->gender}}</p>
                            <p><strong>Địa chỉ: </strong>{{$customer->address}}</p>
                            <p><strong>Phân loại: </strong>
                                @foreach ($customer->classify as $classify)
                                <span style="border: 1px solid #ccc;padding:2px;border-radius:3px;">{{$classify}}</span>
                                @endforeach
                            </p>
                            <p><strong>Nơi làm việc: </strong>{{$customer->company->name}}</p>
                            <p><strong>Nghề nghiệp: </strong>{{$customer->job}}</p>
                            <p><strong>Nhân viên chăm sóc: </strong>
                                @foreach ($customer->user_ids as $user)
                                <span style="border: 1px solid #ccc;padding:2px;border-radius:3px;">{{$user}}</span>
                                @endforeach
                            </p>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin đơn hàng đã mua</h3>
                </div>
                <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Tên đơn hàng</th>
                      <th>Tổng tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (data_get($customer, 'order_ids', []) as $order)
                        <tr>
                            <td>{{ data_get($order, 'name') }}</td>
                            <td>{{ data_get($order, 'total_price') }}</td>
                        </tr>  
                    @endforeach
                  </tbody>
                </table>
            </div>
              </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    @endsection
        