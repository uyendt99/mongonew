@extends('layouts.app')
@section('content')
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
                  <div class="error_permission">
                      @if(Session::has('message'))
                          <div class="error_detail">
                              <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                              <br>
                              <p style="text-algin:center;">{{ Session::get('message') }}</p>
                              <a class="btn btn-info" href="{{route('home')}}">Về trang chủ</a>
                          </div>
                      @endif
                  </div>
              <!-- /.card-header -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->

@endsection
