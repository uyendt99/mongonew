@extends('layouts.app')
@section('breadcrumb')
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item">Quản lý công ty</li>
            </ol>
@endsection
@section('content')
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách công ty</h3>

                <!-- <div class="card-tools">
                
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div> -->
                <a href="{{ route('company.create')}}" id="btn-add" name="btn-add" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
                
              </div>
              <!-- /.card-header -->
              @if(count($companies) > 0)
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Tên công ty</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($companies as $item)
                    <tr>
                      <td>{{$item->name}}</td>
                      <td>
                        <a href="{{route('company.edit', $item->id)}}" class="btn btn-warning btn_action"><i style="color:#fff;" class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('company.delete', $item->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger show_confirm" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                <div class="modal fade" id="linkEditorModal" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="linkEditorModalLabel">Company</h4>
                          </div>
                          <div class="modal-body">
                              <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                                  <div class="form-group">
                                      <label for="inputLink" class="control-label">Tên công ty</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="company" name="name"
                                                placeholder="Enter URL" value="">
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                              </button>
                              <input type="hidden" id="company_id" name="company_id" value="0">
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="card-footer clearfix">
              {{ $companies->links('pagination::bootstrap-4') }}
              </div>
              @else
              <div>
                <p style="text-align: center;">Không có dữ liệu</p>
              </div>
              @endif
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
@endsection