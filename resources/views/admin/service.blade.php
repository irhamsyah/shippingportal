@extends('layouts.admin_main')

@section('content')

<!-- Main content -->
<div class="content-wrapper" style="margin-top:10px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Service</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row" style="margin-bottom:10px;">
              <div class="col-lg-1 col-sm-2">
                <button type="button" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#modal-add-service">New</button>
              </div>
            </div>
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <th>No</th>
                <th>Title</th>
                <th>Detail ID</th>
                <th>Detail EN</th>
                <th>Image</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach($services as $index => $service)
                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $service->title }}</td>
                  <td>{!! $service->detail_id !!}</td>
                  <td>{!! $service->detail_en !!}</td>
                  <td><img src="{{ asset('/img/service/'.$service->img_title) }}" style="max-height:100px;"/></td>
                  <td>
                    <div class="row">
                      <div class="col-6">
                        <a href="#" class="btn btn-block bg-gradient-warning btn-sm"
                            data-toggle="modal" data-target="#modal-edit-service"
                            data-id="{{ $service->id }}"
                            data-title="{{ $service->title }}"
                            data-detailid="{{ $service->detail_id }}"
                            data-detailen="{{ $service->detail_en }}"
                            data-img_title="{{ $service->img_title }}">
                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                        </a>
                      </div>
                      <div class="col-6">
                        <form action="/adm_service" method="post" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                           <button type="submit" class="btn btn-block bg-gradient-danger btn-sm">
                              <i class="fas fa-trash" aria-hidden="true" style="color:#000;"></i>
                           </button>
                           <input type="hidden" name="inputIdService" value="{{ $service->id }}" class="form-control">
                           <input type="hidden" name="inputImgOld" value="{{ $service->img_title }}" class="form-control">
                           <input type="hidden" name="_method" value="DELETE"/>
                           @csrf
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Detail ID</th>
                <th>Detail EN</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <div class="modal fade" id="modal-edit-service">
    <div class="modal-dialog modal-xl">
      <form action="/adm_service" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Service</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <label for="inputTitle">title</label>
                  <input type="text" name="inputTitle" class="form-control">
                </div>
                <div class="col-lg-6 col-sm-12">
                  <label for="inputImage">Upload Image <span style="color:red;">(maks : 3Mb)</span></label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="inputImage" id="inputImage">
                    <label class="custom-file-label" for="inputImage">Choose Image</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputText1">Detail ID</label>
              <textarea id="inputText1" name="inputText1"></textarea>
            </div>
            <div class="form-group">
              <label for="inputTitle1">Detail EN</label>
              <textarea id="inputTitle1" name="inputTitle1"></textarea>
            </div>
            <div class="form-group">
              <input type="hidden" name="inputImgOld" class="form-control">
              <input type="hidden" name="inputIdService" class="form-control">
              <input type="hidden" name="inputIdUser" value="{{ Auth::user()->id }}" class="form-control">
              <input type="hidden" name="_method" value="PUT"/>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
        <!-- /.modal-content -->
      @csrf
    </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="modal-add-service">
    <div class="modal-dialog modal-xl">
      <form action="/adm_service" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Service</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <label for="inputTitle">Title</label>
                  <input type="text" name="inputTitle" class="form-control">
                </div>
                <div class="col-lg-6 col-sm-12">
                  <label for="inputImage">Upload Image <span style="color:red;">(maks : 3Mb)</span></label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="inputImage" id="inputImage">
                    <label class="custom-file-label" for="inputImage">Choose Image</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputText2">Detail ID</label>
              <textarea id="inputText2" name="inputText2"></textarea>
            </div>
            <div class="form-group">
              <label for="inputTitle2">Detail EN</label>
              <textarea id="inputTitle2" name="inputTitle2"></textarea>
            </div>
            <div class="form-group">
              <input type="hidden" name="inputIdUser" value="{{ Auth::user()->id }}" class="form-control">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
        <!-- /.modal-content -->
      @csrf
    </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<!-- /.content -->
@endsection
