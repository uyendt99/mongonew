@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('customer')}}">Quản lý khách hàng</a></li>
              <li class="breadcrumb-item active">Import/Export</li>
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
                <h3 class="card-title">Import/Export khách hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div style="margin:30px 0;">
                <div class="container">
                  <div class="row">
                    <div class="col-md-3">
                    Lưu ý khi import:
                      <p>Dữ liệu cột <strong>phân loại khách hàng, cột nhân viên chăm sóc, đơn hàng</strong> phải được ngăn cách nhau bằng dấu <b>','</b></p>
                      <p>VD: Khách hàng tiềm năng,Khách hàng mới</p>
                    </div>
                    <div class="col-md-1"></div>
                      <div class="col-md-3">
                        <form id="import" class="form_validate" action="{{ route('import.customer') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <label for="">Import khách hàng</label>
                                  <input type="file" name="file" class="form-control">
                                  @if ($errors->any())
                                  <ul style="margin-bottom: 0px;">
                                      @foreach ($errors->all() as $error)
                                          <li class="text-danger">{{ $error }}</li>
                                      @endforeach
                                  </ul>
                                  @endif
                                  <br>
                                  <button class="btn btn-success">Import</button>
                        </form> 
                              <p><b>Xuất danh sách khách hàng</b></p>   
                              <a class="btn btn-warning" href="{{ route('export.customer') }}">Export</a>
                      </div>
                    </div>
                  </div>
              </div>
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
        