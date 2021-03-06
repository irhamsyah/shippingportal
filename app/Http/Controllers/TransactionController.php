<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Users;
use App\Agent;
use App\BankAccount;
use App\Consignee;
use App\Customer;
use App\Location;
use App\Pelayaran;
use App\Tarif;
use App\Transaction;
use App\TransactionDetail;
use App\TruckingType;
use App\VendorTruck;

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

class TransactionController extends Controller
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

    public function admin_transaction()
    {
      $transactions = Transaction::select('transaction.*','customer.code_customer','customer.name_customer','agent.code_agent','agent.name_agent','vendor_truck.code_vendor','vendor_truck.name_vendor',
      'location.code_city','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran','pelayaran.alias')
      ->leftjoin('location','location.id','=','transaction.location_id')
      ->leftjoin('customer','customer.id','=','transaction.customer_id')
      ->leftjoin('agent','agent.id','=','transaction.agent_id')
      ->leftjoin('vendor_truck','vendor_truck.id','=','transaction.vendor_truck_id')
      ->leftjoin('pelayaran','pelayaran.id','=','transaction.pelayaran_id')
      ->orderby('transaction.id','DESC')
      ->get();

      $vendors = VendorTruck::select('vendor_truck.*','name_trucking')
      ->leftjoin('trucking_type','trucking_type.id','=','vendor_truck.trucking_type_id')->get();

      $pelayarans = Pelayaran::all();
      $agents = Agent::all();
      $locations = Location::all();

      return view('admin/transaction', ['transactions'=> $transactions, 'vendors'=> $vendors, 'pelayarans'=> $pelayarans, 'agents'=> $agents, 'locations'=> $locations]);
    }
    public function admin_transaction_add(Request $request)
    {
      $transactions = new Transaction;
      $transactions->shipping_no = $request->inputShipping;
      $transactions->loading_date = $request->inputDate4;
      $transactions->agent_id = $request->inputAgent;
      $transactions->vendor_truck_id = $request->inputVendor;
      $transactions->location_id = $request->inputToCity;
      $transactions->pelayaran_id = $request->inputPelayaran;
      $transactions->resi_no = $request->inputResi;
      $transactions->status = $request->inputStatus;
      $transactions->save();

      $transactions = Transaction::select('transaction.*','customer.code_customer','customer.name_customer','agent.code_agent','agent.name_agent','vendor_truck.code_vendor','vendor_truck.name_vendor',
      'location.code_city','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran','pelayaran.alias')
      ->leftjoin('location','location.id','=','transaction.location_id')
      ->leftjoin('customer','customer.id','=','transaction.customer_id')
      ->leftjoin('agent','agent.id','=','transaction.agent_id')
      ->leftjoin('vendor_truck','vendor_truck.id','=','transaction.vendor_truck_id')
      ->leftjoin('pelayaran','pelayaran.id','=','transaction.pelayaran_id')
      ->orderby('transaction.id','DESC')
      ->get();

      $vendors = VendorTruck::select('vendor_truck.*','name_trucking')
      ->leftjoin('trucking_type','trucking_type.id','=','vendor_truck.trucking_type_id')->get();

      $pelayarans = Pelayaran::all();
      $agents = Agent::all();
      $locations = Location::all();

      return view('admin/transaction', ['transactions'=> $transactions, 'vendors'=> $vendors, 'pelayarans'=> $pelayarans, 'agents'=> $agents, 'locations'=> $locations]);
    }
    public function admin_transaction_edit(Request $request)
    {
      //update Transaction
      $transactions = Transaction::find($request->inputIdTransaction);
      $transactions->shipping_no = $request->inputShipping;
      $transactions->loading_date = $request->inputDate3;
      $transactions->agent_id = $request->inputAgent;
      $transactions->vendor_truck_id = $request->inputVendor;
      $transactions->location_id = $request->inputToCity;
      $transactions->pelayaran_id = $request->inputPelayaran;
      $transactions->resi_no = $request->inputResi;
      $transactions->status = $request->inputStatus;
      $transactions->save();

      $transactions = Transaction::select('transaction.*','customer.code_customer','customer.name_customer','agent.code_agent','agent.name_agent','vendor_truck.code_vendor','vendor_truck.name_vendor',
      'location.code_city','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran','pelayaran.alias')
      ->leftjoin('location','location.id','=','transaction.location_id')
      ->leftjoin('customer','customer.id','=','transaction.customer_id')
      ->leftjoin('agent','agent.id','=','transaction.agent_id')
      ->leftjoin('vendor_truck','vendor_truck.id','=','transaction.vendor_truck_id')
      ->leftjoin('pelayaran','pelayaran.id','=','transaction.pelayaran_id')
      ->orderby('transaction.id','DESC')
      ->get();

      $vendors = VendorTruck::select('vendor_truck.*','name_trucking')
      ->leftjoin('trucking_type','trucking_type.id','=','vendor_truck.trucking_type_id')->get();

      $pelayarans = Pelayaran::all();
      $agents = Agent::all();
      $locations = Location::all();

      return view('admin/transaction', ['transactions'=> $transactions, 'vendors'=> $vendors, 'pelayarans'=> $pelayarans, 'agents'=> $agents, 'locations'=> $locations]);
    }
    //Direct to Proses Delete Transaction
    public function admin_transaction_destroy(Request $request)
    {
      $transactions = Tracking::find($request->inputIdTransaction);
      $transactions->delete();

      $transactions = Transaction::select('transaction.*','customer.code_customer','customer.name_customer','agent.code_agent','agent.name_agent','vendor_truck.code_vendor','vendor_truck.name_vendor',
      'location.code_city','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran','pelayaran.alias')
      ->leftjoin('location','location.id','=','transaction.location_id')
      ->leftjoin('customer','customer.id','=','transaction.customer_id')
      ->leftjoin('agent','agent.id','=','transaction.agent_id')
      ->leftjoin('vendor_truck','vendor_truck.id','=','transaction.vendor_truck_id')
      ->leftjoin('pelayaran','pelayaran.id','=','transaction.pelayaran_id')
      ->orderby('transaction.id','DESC')
      ->get();

      $vendors = VendorTruck::select('vendor_truck.*','name_trucking')
      ->leftjoin('trucking_type','trucking_type.id','=','vendor_truck.trucking_type_id')->get();

      $pelayarans = Pelayaran::all();
      $agents = Agent::all();
      $locations = Location::all();

      return view('admin/transaction', ['transactions'=> $transactions, 'vendors'=> $vendors, 'pelayarans'=> $pelayarans, 'agents'=> $agents, 'locations'=> $locations]);
    }
}
