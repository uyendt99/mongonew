@extends('layouts.app')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Company</h3>

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
                  <button id="btn-add" name="btn-add" class="btn btn-primary float-right">Add</button>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Tên công ty</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($companies as $item)
                    <tr>
                      <td>{{$item->name}}</td>
                      <td>
                      <button class="btn btn-info open-modal" value="{{$item->id}}">Edit</button>
                      <button class="btn btn-danger delete-link" value="{{$item->id}}">Delete</button>
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
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
@endsection