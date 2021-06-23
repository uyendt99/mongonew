@extends('layouts.app')
@section('content')
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Import/Export đơn hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                @if ( Session::has('error') )
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong>{{ Session::get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                @endif
              <div class="container">
                <div class="justify-content-center col-md-4 offset-md-4">
                    <div style="margin:30px 0;">
                        <form action="{{ route('import.order') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="">Import đơn hàng</label>
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
                        <p><b>Xuất danh sách đơn hàng</b></p>   
                        <a class="btn btn-warning" href="{{ route('export.order') }}">Export</a>
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
        