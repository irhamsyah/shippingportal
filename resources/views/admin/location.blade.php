@extends('layouts.admin_main')

@section('content')

<!-- Main content -->
<div class="content-wrapper" style="margin-top:10px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Locationt</h3>
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
                <th>City</th>
                <th>Province</th>
                <th>Loading</th>
                <th>Pelayaran</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($locations as $index => $location)
                @if($location->status_loading==0)
                  @php ($status_loading='Inactive')
                @else
                  @php ($status_loading='Active')
                @endif
                @if($location->status_pelayaran==0)
                  @php ($status_pelayaran='Inactive')
                @else
                  @php ($status_pelayaran='Active')
                @endif
                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $location->code_city }}</td>
                  <td>{{ $location->name_city }}</td>
                  <td>{{ $location->province_city }}</td>
                  <td>{{ $status_loading }}</td>
                  <td>{{ $status_pelayaran }}</td>
                  <td>
                    <a href="/deletelocation" class="btn btn-block bg-gradient-danger btn-xs" style="margin-top:0; margin-left:5px;">
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
                <th>City</th>
                <th>Province</th>
                <th>Loading</th>
                <th>Pelayaran</th>
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
