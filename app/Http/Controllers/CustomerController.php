<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Users;
use App\BankAccount;
use App\Customer;
use App\Location;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

use App;
use Auth;
use Validator;
use Hash;
use Image;
use Mail;
use PDF;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Untuk munculkan home setelah register user
    public function index()
    {
        return view('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin_customer()
    {
      $customers = Customer::select('customer.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','customer.id_city')->get();
      //dd($customers);
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/customer', ['customers'=> $customers,'locations'=> $locations]);
    }
    public function admin_customer_add(Request $request)
    {
      $customers = new Customer;
      $customers->code_customer = $request->inputCostumerCode;
      $customers->name_customer = $request->inputCostumerName;
      $customers->address_invoice = $request->inputAddressInvoice;
      $customers->address = $request->inputAddress;
      $customers->id_city = $request->inputIdCity;
      $customers->postal = $request->inputPostal;
      $customers->telp = $request->inputTelp;
      $customers->fax = $request->inputFax;
      $customers->npwp = $request->inputNPWP;
      $customers->pkp_no = $request->inputPkp;
      $customers->desc_customer = $request->inputCustomerDesc;
      $customers->payment_term = $request->inputTOP;
      $customers->name_person = $request->inputPersonName;
      $customers->phone_person = $request->inputPersonEmail;
      $customers->email_person = $request->inputPersonPhone;
      $customers->fax_person = $request->inputPersonFax;
      $customers->created_at = date('Y-m-d H:i:s');
      $customers->save();

      $customers = Customer::select('customer.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','customer.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/customer', ['customers'=> $customers,'locations'=> $locations]);
    }
    public function admin_customer_edit(Request $request)
    {
      //update Customer
      $customers = Customer::find($request->inputIdCustomer);
      $customers->code_customer = $request->inputCostumerCode;
      $customers->name_customer = $request->inputCostumerName;
      $customers->address_invoice = $request->inputAddressInvoice;
      $customers->address = $request->inputAddress;
      $customers->id_city = $request->inputIdCity;
      $customers->postal = $request->inputPostal;
      $customers->telp = $request->inputTelp;
      $customers->fax = $request->inputFax;
      $customers->npwp = $request->inputNPWP;
      $customers->pkp_no = $request->inputPkp;
      $customers->desc_customer = $request->inputCustomerDesc;
      $customers->payment_term = $request->inputTOP;
      $customers->name_person = $request->inputPersonName;
      $customers->phone_person = $request->inputPersonEmail;
      $customers->email_person = $request->inputPersonPhone;
      $customers->fax_person = $request->inputPersonFax;
      $customers->updated_at = date('Y-m-d H:i:s');
      $customers->save();

      $customers = Customer::select('customer.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','customer.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/customer', ['customers'=> $customers,'locations'=> $locations]);
    }
    //Direct to Proses DeleteCustomer
    public function admin_customer_destroy(Request $request)
    {
      $customers = Customer::find($request->inputIdCustomer);
      $customers->delete();

      $customers = Customer::select('customer.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','customer.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/customer', ['customers'=> $customers,'locations'=> $locations]);
    }
}
