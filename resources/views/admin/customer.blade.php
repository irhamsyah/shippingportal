@extends('layouts.admin_main')

@section('content')

<!-- Main content -->
<div class="content-wrapper" style="margin-top:10px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Customer</h3>
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
                <th>Name Customer</th>
                <th>Location</th>
                <th>Telp</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($customers as $index => $customer)
                @if($customer->status==0)
                  @php ($status='Inactive')
                @else
                  @php ($status='Active')
                @endif

                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ strtoupper($customer->code_customer) }}</td>
                  <td>{{ strtoupper($customer->name_customer) }}</td>
                  <td>{{ $customer->name_city.' - '.$customer->province_city }}</td>
                  <td>{{ $customer->telp }}</td>
                  <td>{{ $status }}</td>
                  <td>
                    <a href="/deletecustomer" class="btn btn-block bg-gradient-danger btn-xs" style="margin-top:0; margin-left:5px;">
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
                <th>Name Customer</th>
                <th>Location</th>
                <th>Telp</th>
                <th>Status</th>
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
