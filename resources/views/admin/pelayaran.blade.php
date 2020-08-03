@extends('layouts.admin_main')

@section('content')

<!-- Main content -->
<div class="content-wrapper" style="margin-top:10px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Pelayaran</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row" style="margin-bottom:10px;">
              <div class="col-1">
                <button type="button" class="btn btn-block btn-outline-primary">New</button>
              </div>
              <div class="col-1">
                <button type="button" class="btn btn-block btn-outline-warning">Edit</button>
              </div>
            </div>
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Code</th>
                <th>Name Pelayaran</th>
                <th>Location</th>
                <th>Telp</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($pelayarans as $index => $pelayaran)
                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ strtoupper($pelayaran->code_pelayaran) }}</td>
                  <td>{{ strtoupper($pelayaran->name_pelayaran).' alias: '.$pelayaran->alias }}</td>
                  <td>{{ $pelayaran->name_city.' - '.$pelayaran->province_city }}</td>
                  <td>{{ $pelayaran->telp }}</td>
                  <td>
                    <a href="/deletepelayaran" class="btn btn-block bg-gradient-danger btn-xs" style="margin-top:0; margin-left:5px;">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      <span>Delete</span>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Code</th>
                <th>Name Pelayaran</th>
                <th>Location</th>
                <th>Telp</th>
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
</div>
<!-- /.content -->
@endsection
