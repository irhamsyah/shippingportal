@extends('layouts.page_main')

@section('content')
<section class="mbr-section form1 cid-s9mrYkgQsS" id="form1-27">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    TRANSACTION
                </h2>
            </div>
        </div>
        <div class="row">
          <div class="card p-3 col-lg-12">
              <div class="card-wrapper ">
                <h4 style="background:#000; color:#FFF;"><center>Customer Detail</center></h4>
                <div class="dragArea row">
                  <div class="col-md-2 form-group">
                      <label class="form-control-label mbr-fonts-style display-7">Code Customer</label>
                      <input type="text" value="{{ $customers->code_customer }}" class="form-control display-7" disabled="disabled">
                  </div>
                  <div class="col-md-5 form-group">
                      <label class="form-control-label mbr-fonts-style display-7">Name Customer</label>
                      <input type="text" value="{{ $customers->name_customer.', '.$customers->entity_name }}" class="form-control display-7" disabled="disabled">
                  </div>
                  <div class="col-md-5 form-group">
                      <label class="form-control-label mbr-fonts-style display-7">Location</label>
                      <input type="text" value="{{ $customers->name_city.', '.$customers->province_city }}" class="form-control display-7" disabled="disabled">
                  </div>
                  <div class="col-md-8 form-group">
                      <label class="form-control-label mbr-fonts-style display-7">Address</label>
                      <input type="text" value="{{ $customers->address }}" class="form-control display-7" disabled="disabled">
                  </div>
                  <div class="col-md-2 form-group">
                      <label class="form-control-label mbr-fonts-style display-7">Postal</label>
                      <input type="text" value="{{ $customers->postal }}" class="form-control display-7" disabled="disabled">
                  </div>
                  <div class="col-md-2 form-group">
                      <label class="form-control-label mbr-fonts-style display-7">Phone</label>
                      <input type="text" value="{{ $customers->telp }}" class="form-control display-7" disabled="disabled">
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
    <div class="container">
      <h4 style="background:#000; color:#FFF;"><center>Customer Transaction</center></h4>
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-12" data-form-type="formoid">
              <div class="row">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card" style="width:100%;">
                    <div class="card-header">
                      <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                          <li class="nav-item">
                            <a class="nav-link active btn btn-primary btn-form" style="padding:0.5rem" href="#pemesanan"  data-toggle="tab">Form Transaction</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link btn btn-primary btn-form" style="padding:0.5rem" href="#list-pemesanan" data-toggle="tab">History Transaction</a>
                          </li>
                        </ul>
                      </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="pemesanan" style="position: relative; min-height: 300px;">
                          <!---Formbuilder Form--->
                          <form action="/trans_new" method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form">
                            <div class="dragArea row">
                              <div class="col-md-4  form-group" data-for="xxx">
                                <select class="form-control display-7" id="xxx" name="xxx" data-form-field="xxx" style="display:none;">
                                  <option value="#" selected="true" disabled="disabled">--- xxx ---</option>
                                </select>
                              </div>
                            </div>
                            <div class="dragArea row">
                                <div class="col-md-3  form-group">
                                    <?php
                                    //Get last Trans No
                                    $lasttransno=$transactionnos->trans_no;
                                    //check tahun sama
                                    $thn=substr($lasttransno, 2, 4);
                                    if($thn==date('Y')){
                                      $pecah=substr($lasttransno, 8, 4);
                                    }else{
                                      $pecah=0;
                                    }
                                    //generate No Transaction
                                    $transnonew = "TR".date('Ym').sprintf("%04s", $pecah+1);
                                    ?>
                                    <label class="form-control-label mbr-fonts-style display-7">Trans No</label>
                                    <input type="text" name="transno" required="required" readonly value="{{ $transnonew }}" class="form-control display-7" id="transno">
                                </div>
                                <div class="col-md-3  form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">From</label>
                                    <select class="form-control display-7" id="from" name="from">
                                      <option value="#" selected="true" disabled="disabled">{{ $customers->name_city.' - '.$customers->province_city }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3  form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">To</label>
                                    <select class="form-control display-7" id="to" name="to">
                                      <option value="#" selected="true" disabled="disabled">-- Select City --</option>
                                      @foreach($locations as $location)
                                      <option value="{{ $location->loc_id }}">{{ $location->name_city.' - '.$location->province_city }}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3  form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">Departing Date</label>
                                    <input type="date" name="departingdate" class="form-control display-7" id="departingdate">
                                </div>
                            </div>
                            <h4 style="background:#000; color:#FFF;"><center>Detail Transaction</center></h4>
                            <button type="button" id="add_detail" class="btn btn-form" style="background:green; color: #FFF; padding:0.5rem;">Add</button>
                            <div id="detailTrans">
                              <div class="dragArea row">
                                  <div class="col-md-4  form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">Consignee</label>
                                    <select class="form-control display-7" id="consignee" name="consignee[]" required="required">
                                      <option value="#" selected="true" disabled="disabled">--- Select Consignee ---</option>
                                      @foreach($consignees as $consignee)
                                      <option value="{{ $consignee->id  }}">{{ $consignee->code_consignee.' - '.$consignee->name_consignee }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-4  form-group">
                                      <label class="form-control-label mbr-fonts-style display-7">Comodity</label>
                                      <input type="text" id="comodity" name="comodity[]" class="form-control display-7">
                                  </div>
                                  <div class="col-md-4  form-group">
                                      <label class="form-control-label mbr-fonts-style display-7">Package Unit</label>
                                      <input type="text" id="package" name="package[]" class="form-control display-7">
                                  </div>
                                  <div class="col-md-2  form-group">
                                      <label class="form-control-label mbr-fonts-style display-7">Weight (Kg)</label>
                                      <input type="text" id="weight" name="weight[]" class="form-control display-7">
                                  </div>
                                  <div class="col-md-2  form-group">
                                      <label class="form-control-label mbr-fonts-style display-7">Cargo Quantity</label>
                                      <input type="text" id="quantity" name="quantity[]" class="form-control display-7">
                                  </div>
                                  <div class="col-md-2  form-group">
                                      <label class="form-control-label mbr-fonts-style display-7">Lenght (M)</label>
                                      <input type="text" id="lenght" name="lenght[]" class="lenght form-control display-7">
                                  </div>
                                  <div class="col-md-2  form-group">
                                      <label class="form-control-label mbr-fonts-style display-7">Width (M)</label>
                                      <input type="text" id="width" name="width[]" class="width form-control display-7">
                                  </div>
                                  <div class="col-md-2  form-group">
                                      <label class="form-control-label mbr-fonts-style display-7">Height (M)</label>
                                      <input type="text" id="height" name="height[]" class="height form-control display-7">
                                  </div>
                                  <div class="col-md-1  form-group"></div>
                                  <div class="col-md-1  form-group">
                                      <label class="form-control-label mbr-fonts-style display-7">Action</label>
                                      <button type="button" id="del_detail" class="btn btn-form" style="background:red; color: #FFF; padding:0.5rem;">Del</button>
                                  </div>
                                </div>
                              </div>
                              <div class="dragArea row">
                                <input type="hidden" name="_method" value="PUT"/>
                                <input type="hidden" name="customerid" value="{{ $customers->id }}"/>
                              </div>
                              <div class="col-md-12 input-group-btn align-center"><button type="submit" class="btn btn-primary btn-form display-4">SUBMIT</button></div>
                              @csrf
                          </form><!---Formbuilder Form--->
                        </div>
                        <div class="chart tab-pane" id="list-pemesanan" style="position: relative; min-height: 300px;">
                          <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th>No</th>
                                <th>Trans No</th>
                                <th>Shipping No</th>
                                <th>Loading Date</th>
                                <th>Agent</th>
                                <th>Vessel</th>
                                <th>Truck</th>
                                <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($transactions as $index => $transaction)
                                @if($transaction->status==0)
                                  @php ($status='Process')
                                @else
                                  @php ($status='Success')
                                @endif

                                <tr>
                                  <td>{{ $index+1 }}</td>
                                  <td>{{ strtoupper($transaction->trans_no) }}</td>
                                  <td>{{ strtoupper($transaction->shipping_no)}}</td>
                                  <td>{{ $transaction->loading_date}}</td>
                                  <td>{{ $transaction->code_agent.' - '.$transaction->name_agent }}</td>
                                  <td>{{ $transaction->name_pelayaran.' - '.$transaction->alias }}</td>
                                  <td>{{ $transaction->code_vendor.' - '.$transaction->name_vendor }}</td>
                                  <td>{{ $status }}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                      </div>
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<div id="detailtrans_hide" style="display:none;">
  <div class="dragArea row">
      <div class="col-md-4  form-group">
        <label class="form-control-label mbr-fonts-style display-7">Consignee</label>
        <select class="form-control display-7" id="consignee" name="consignee[]" required="required">
          <option value="#" selected="true" disabled="disabled">--- Select Consignee ---</option>
          @foreach($consignees as $consignee)
          <option value="{{ $consignee->id  }}">{{ $consignee->code_consignee.' - '.$consignee->name_consignee }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-4  form-group">
          <label class="form-control-label mbr-fonts-style display-7">Comodity</label>
          <input type="text" id="comodity" name="comodity[]" class="form-control display-7">
      </div>
      <div class="col-md-4  form-group">
          <label class="form-control-label mbr-fonts-style display-7">Package Unit</label>
          <input type="text" id="package" name="package[]" class="form-control display-7">
      </div>
      <div class="col-md-2  form-group">
          <label class="form-control-label mbr-fonts-style display-7">Weight (Kg)</label>
          <input type="text" id="weight" name="weight[]" class="form-control display-7">
      </div>
      <div class="col-md-2  form-group">
          <label class="form-control-label mbr-fonts-style display-7">Cargo Quantity</label>
          <input type="text" id="quantity" name="quantity[]" class="form-control display-7">
      </div>
      <div class="col-md-2  form-group">
          <label class="form-control-label mbr-fonts-style display-7">Lenght (M)</label>
          <input type="text" id="lenght" name="lenght[]" class="lenght form-control display-7">
      </div>
      <div class="col-md-2  form-group">
          <label class="form-control-label mbr-fonts-style display-7">Width (M)</label>
          <input type="text" id="width" name="width[]" class="width form-control display-7">
      </div>
      <div class="col-md-2  form-group">
          <label class="form-control-label mbr-fonts-style display-7">Height (M)</label>
          <input type="text" id="height" name="height[]" class="height form-control display-7">
      </div>
      <div class="col-md-1  form-group"></div>
      <div class="col-md-1  form-group">
          <label class="form-control-label mbr-fonts-style display-7">Action</label>
          <button type="button" id="del_detail" class="btn btn-form" style="background:red; color: #FFF; padding:0.5rem;">Del</button>
      </div>
    </div>
  </div>

@endsection
