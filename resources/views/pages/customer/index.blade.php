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
            <div class="row">
                <div class="col-md-6">
                    <h3 style="font-weight: 600;" class="card-title">Danh sách khách hàng </h3>
                    <br>
                    <p>(Tìm thấy: {{count($customers)}} khách hàng)</p>
                </div>
                <div class="col-md-6">
                    <div class="btn-group float-right">
                        <button type="button" class="btn btn-info">Khác</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
{{--                            <button id="export" class="dropdown-item export-checkbox">Export</button>--}}
                            <a class="dropdown-item" href="{{route('export.customer')}}">Export</a>
                            <button class="dropdown-item import_data" data-toggle="modal" data-target="#importCustomer">Import</button>
                            <button class="dropdown-item delete-all" data-url="">Xóa các bản ghi</button>
                        </div>
                        <a href="{{ route('customer.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right" style="margin-left:10px;">Thêm</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            @if(count($customers) > 0)
            <div class="row">
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th><input type="checkbox" id="check_all"></th>
                      <th>Tên</th>
                      <th>Tuổi</th>
                      <th>Giới tính</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                      <th>Địa chỉ</th>
                      <th>Phân loại</th>
                      <th>Nơi làm việc</th>
                      <th>Nghề nghiệp</th>
                      <th>Nhân viên chăm sóc</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($customers as $rs)
                    <tr id="tr_{{$rs->id}}">
                      <td style="text-align: center;"><input type="checkbox" name="customer_id[]" class="checkbox" data-id="{{$rs->id}}"></td>
                      <td>{{$rs->name}}</td>
                      <td>{{$rs->age}}</td>
                      <td>@if($rs->gender == 1) Nữ @elseif($rs->gender == 0) Nam @else Khác @endif</td>
                      <td>{{$rs->phone}}</td>
                      <td>{{$rs->email}}</td>
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
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu drop_custom">
                            <a class="dropdown-item" href="{{route('customer.edit', $rs->id)}}">Sửa</a>
                            <form action="{{route('customer.delete', $rs->id)}}" method="post">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="dropdown-item show_confirm btn_action" type="submit">Xóa</button>
                            </form>
                            <a class="dropdown-item" href="{{route('customer.show', $rs->id)}}">Chi tiết</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>

                  </tfoot>
                </table>
                <div>
                {{ $customers->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
            @else
            <div>
              <p style="text-align: center;">Không có dữ liệu</p>
            </div>
            @endif
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</div><!-- /.container-fluid -->
<div class="modal fade" id="importCustomer" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Body -->
      <div class="modal-body">
        <div>
          Import Khách hàng
        </div>
        <form action="{{ route('import.customer') }}" id="import" class="form_validate" method="POST" enctype="multipart/form-data">
          @csrf
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
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#check_all').on('click', function(e) {
      if ($(this).is(':checked', true)) {
        $(".checkbox").prop('checked', true);
        //$( "#export" ).addClass("export-checkbox");
      } else {
        $(".checkbox").prop('checked', false);
        //$( "#export" ).removeClass("export-checkbox");
      }


    });
    $('.checkbox').on('click', function() {
      if ($('.checkbox:checked').length == $('.checkbox').length) {
        $('#check_all').prop('checked', true);
      } else {
        $('#check_all').prop('checked', false);
      }
    });
    $('.delete-all').on('click', function(e) {
      var idsArr = [];
      $(".checkbox:checked").each(function() {
        idsArr.push($(this).attr('data-id'));
      });

      if (idsArr.length <= 0) {
        alert("Vui lòng chọn bản ghi bạn muốn xóa");
      } else {
        var idss = idsArr.length;
        if (confirm('Bạn có chắc chắn muốn xóa ' + idss + ' bản ghi đã chọn?')) {
          var strIds = idsArr.join(",");
          $.ajax({
            url: "{{route('customer.deleteAll')}}",
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: 'ids=' + strIds,
            success: function(data) {
              console.log(data);
              if (data['status'] == true) {
                $(".checkbox:checked").each(function() {
                  $(this).parents("tr").remove();
                    location.reload();
                });
                alert(data['message']);
              } else {
                alert('Lỗi!!');
              }

            },
            error: function(data) {
              console.log(data);
              //alert(data.responseText);
            }
          });
        }
      }
    });
    $('.export-checkbox').on('click', function(e) {
      var idsArr = [];
      $(".checkbox:checked").each(function() {
        idsArr.push($(this).attr('data-id'));
      });
        if (idsArr.length <= 0) {
            alert("Vui lòng chọn bản ghi bạn muốn xuất");
        } else {
            var idss = idsArr.length;
            if (confirm('Bạn đồng ý xuất ' + idss + ' bản ghi đã chọn?')) {
                var strIds = idsArr.join(",");
                $.ajax({
                    url: "{{route('export.customer')}}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: 'ids=' + strIds,
                    success: function (data) {
                        // if (data['status']==true) {
                        //     alert(data['message']);
                        // } else {
                        //     alert('Lỗi!!');
                        // }
                        // console.log(data);
                    },
                    error: function (data) {
                        console.log(data);
                        //alert(data.responseText);
                    }
                });
            }
        }
    });
    // $('[data-toggle=confirmation]').confirmation({
    //     rootSelector: '[data-toggle=confirmation]',
    //     onConfirm: function (event, element) {
    //         element.closest('form').submit();
    //     }
    // });

  });
</script>
@endsection
