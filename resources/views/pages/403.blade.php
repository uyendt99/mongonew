@extends('layouts.app')
@section('content')
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              @if(Session::has('message'))
               <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong style="text-algin:center;">{{ Session::get('message') }}</strong>
               </div>
               <br>
               @endif
              </div>
              <!-- /.card-header -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    
@endsection
