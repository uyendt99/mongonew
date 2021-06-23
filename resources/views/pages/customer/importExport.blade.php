@extends('layouts.app')
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
              <div class="container">
                <div class="justify-content-center col-md-3 offset-md-4">
                    <div style="margin:30px 0;">
                        <form action="{{ route('import.customer') }}" method="POST" enctype="multipart/form-data">
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
        