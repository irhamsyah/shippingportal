<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Users;
use App\News;
use App\NewsCategory;
use App\NewsImage;
use App\Agent;
use App\BankAccount;
use App\Consignee;
use App\Customer;
use App\Location;
use App\Pelayaran;
use App\Tarif;
use App\TruckingType;
use App\VendorTruck;
use App\Testimoni;
use App\Slider;
use App\Service;
use App\Entity;
use App\Transaction;
use App\TransactionDetail;
use App\Tracking;

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

class FrontendController extends Controller
{
  public function index(){
    $testimonis = Testimoni::all();

    $sliders = Slider::all();

    $newss_id = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
    ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
    ->leftjoin('users', 'users.id', '=', 'news.id_user')
    ->where('location','id')
    ->orderBy('news.id','desc')->limit(3)->get();

    $newss_en = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
    ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
    ->leftjoin('users', 'users.id', '=', 'news.id_user')
    ->where('location','en')
    ->orderBy('news.id','desc')->limit(3)->get();

    return view('home', ['sliders'=> $sliders,'testimonis'=> $testimonis,'newss_id'=> $newss_id,'newss_en'=> $newss_en]);
  }

  public function service(){
    $services = Service::all();

    return view('page_service', ['services'=> $services]);
  }

  public function contact(){
    $entitys = Entity::all();
    $locations = Location::all();

    return view('page_contact', ['entitys'=> $entitys, 'locations'=> $locations]);
  }

  public function contact_add(Request $request)
  {
    if($request->password==$request->passwordconf)
    {
      //enkripsi md5 password
      $password=md5($request->password);
      //Get last code customer
      $lastcodecustomer=Customer::select('code_customer')
      ->orderBy('id','desc')->limit(1)->get();
      //generate code customer
      $pecah=substr($lastcodecustomer, 20, 4);
      $codecustomer = "R" . sprintf("%04s", $pecah+1);

      $customers = new Customer;
      $customers->code_customer = $codecustomer;
      $customers->name_customer = $request->company;
      $customers->address_invoice = $request->npwpaddress;
      $customers->address = $request->address;
      $customers->id_city = $request->city;
      $customers->postal = $request->postal;
      $customers->telp = $request->phone;
      $customers->fax = $request->fax;
      $customers->npwp = $request->npwp;
      $customers->pkp_no = 0;
      $customers->desc_customer = '';
      $customers->payment_term = 0;
      $customers->name_person = $request->company;
      $customers->phone_person = $request->mphone;
      $customers->email_person = $request->email;
      $customers->fax_person = $request->fax;
      $customers->username = $request->username;
      $customers->password = $password;
      $customers->entity_id = $request->entity;
      $customers->created_at = date('Y-m-d H:i:s');
      $customers->save();
    }

    $entitys = Entity::all();
    $locations = Location::all();

    return view('page_contact', ['entitys'=> $entitys, 'locations'=> $locations]);
  }

  public function tracking(){
    //check validasi resi
    $trackings = Tracking::select('tracking.*','transaction.resi_no')
    ->leftjoin('transaction','transaction.id','=','tracking.transaction_id')
    ->where('transaction.resi_no','=','xxx')
    ->get();

    return view('page_tracking', ['trackings'=> $trackings]);
  }
  public function trackingpost(Request $request){
    //check validasi resi
    if(!is_null($request->resi)){$resi=$request->resi;}else{$resi='xxx';}

    $trackings = Tracking::select('tracking.*','transaction.resi_no')
    ->leftjoin('transaction','transaction.id','=','tracking.transaction_id')
    ->where('transaction.resi_no','=',$resi)
    ->get();

    return view('page_tracking', ['trackings'=> $trackings]);
  }

  public function news()
  {
   //get id news from url
   $newss2 = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
   ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
   ->leftjoin('users', 'users.id', '=', 'news.id_user')
   ->orderBy('news.id','desc')->limit(5)->get();

   $newss3 = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
   ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
   ->leftjoin('users', 'users.id', '=', 'news.id_user')
   ->orderBy('news.id','desc')->limit(1)->get();

   $newss_en = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
   ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
   ->leftjoin('users', 'users.id', '=', 'news.id_user')
   ->where('location','en')
   ->orderBy('news.id','desc')->get();

   $newss_id = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
   ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
   ->leftjoin('users', 'users.id', '=', 'news.id_user')
   ->where('location','id')
   ->orderBy('news.id','desc')->get();
   //dd($newss);
   return view('page_news', ['newss3'=> $newss3,'newss2'=> $newss2,'newss_en'=> $newss_en,'newss_id'=> $newss_id]);
  }

  public function news_detail(Request $request)
  {
   //get id news from url
   $newss = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
   ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
   ->leftjoin('users', 'users.id', '=', 'news.id_user')
   ->where('news.id',$request->route('id'))
   ->orderBy('news.created_at','desc')->get();
   //dd($newss);
   return view('page_news_detail', ['newss'=> $newss]);
  }

  public function trans_new(Request $request){
    //convert inputan password
    $pass=md5($request->password);

    $customers = Customer::select('customer.*','location.name_city','location.province_city','entity.entity_name')
    ->leftjoin('location','location.id','=','customer.id_city')
    ->leftjoin('entity','entity.id','=','customer.entity_id')
    ->where([['username','=',$request->username],['password','=',$pass ]])
    ->first();

    //check validasi data customer
    if(!is_null($customers)){
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();
      $consignees = Consignee::select('consignee.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','consignee.id_city')->get();
      $transactions = Transaction::select('transaction.*','customer.code_customer','customer.name_customer','agent.code_agent','agent.name_agent','vendor_truck.code_vendor','vendor_truck.name_vendor',
      'location.code_city','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran','pelayaran.alias')
      ->leftjoin('location','location.id','=','transaction.location_id')
      ->leftjoin('customer','customer.id','=','transaction.customer_id')
      ->leftjoin('agent','agent.id','=','transaction.agent_id')
      ->leftjoin('vendor_truck','vendor_truck.id','=','transaction.vendor_truck_id')
      ->leftjoin('pelayaran','pelayaran.id','=','transaction.pelayaran_id')
      ->where('transaction.customer_id',$customers->id)->get();
      $transactionnos = Transaction::select('id','trans_no')->orderby('id','DESC')->first();
      //dd($customers->id);
      return view('page_trans_new', ['customers'=> $customers, 'locations'=> $locations, 'consignees'=> $consignees, 'transactions'=> $transactions, 'transactionnos'=> $transactionnos]);
    }else{
      $services = Service::all();
      return view('page_service', ['services'=> $services]);
    }
  }
  public function trans_new_add(Request $request)
  {
    //Get last Trans No
    $lasttransnos=Transaction::select('trans_no')->orderby('id','DESC')->first();
    $lasttransno=$lasttransnos->trans_no;
    //check tahun sama
    $thn=substr($lasttransno, 2, 4);
    if($thn==date('Y')){
      $pecah=substr($lasttransno, 8, 4);
    }else{
      $pecah=0;
    }
    //generate code Transaction
    $transnonew = "TR".date('Ym').sprintf("%04s", $pecah+1);
    $resi_no = mt_rand().'00';

    $transactions = new Transaction;
    $transactions->trans_no = $transnonew;
    $transactions->customer_id = $request->customerid;
    $transactions->loading_date = $request->departingdate;
    $transactions->location_id = $request->to;
    $transactions->resi_no = $resi_no;
    $transactions->save();
    if($transactions){
      //Get Transaction id
      $transaction_id=Transaction::select('id')->where('trans_no',$transnonew)->first();

      $consignees = $request->input('consignee');
      $comoditys = $request->input('comodity');
      $weights = $request->input('weight');
      $quantitys  = $request->input('quantity');
      $packages  = $request->input('package');
      $lenghts  = $request->input('lenght');
      $widths  = $request->input('width');
      $heights  = $request->input('height');

      foreach($consignees as $key => $consignee) {
        //generate Volume (m3)
        $volume = $lenghts[$key]*$widths[$key]*$heights[$key];
        //Save data to table trans Detail
        $transactiondetails = new TransactionDetail;
        $transactiondetails->transaction_id = $transaction_id->id;
        $transactiondetails->consignee_id = $consignee;
        $transactiondetails->comodity = isset($comoditys[$key]) ? $comoditys[$key] : '';
        $transactiondetails->weight = isset($weights[$key]) ? $weights[$key] : '';
        $transactiondetails->quantity = isset($quantitys[$key]) ? $quantitys[$key] : '';;
        $transactiondetails->package_unit = isset($packages[$key]) ? $packages[$key] : '';;
        $transactiondetails->length = isset($lenghts[$key]) ? $lenghts[$key] : '';;
        $transactiondetails->width = isset($widths[$key]) ? $widths[$key] : '';;
        $transactiondetails->height = isset($heights[$key]) ? $heights[$key] : '';;
        $transactiondetails->volume = $volume;
        $transactiondetails->save();
      }
    }

    $customers = Customer::select('customer.*','location.name_city','location.province_city','entity.entity_name')
    ->leftjoin('location','location.id','=','customer.id_city')
    ->leftjoin('entity','entity.id','=','customer.entity_id')
    ->where('customer.id','=',$request->customerid)
    ->first();
    $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();
    $consignees = Consignee::select('consignee.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','consignee.id_city')->get();
    $transactions = Transaction::select('transaction.*','customer.code_customer','customer.name_customer','agent.code_agent','agent.name_agent','vendor_truck.code_vendor','vendor_truck.name_vendor',
    'location.code_city','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran','pelayaran.alias')
    ->leftjoin('location','location.id','=','transaction.location_id')
    ->leftjoin('customer','customer.id','=','transaction.customer_id')
    ->leftjoin('agent','agent.id','=','transaction.agent_id')
    ->leftjoin('vendor_truck','vendor_truck.id','=','transaction.vendor_truck_id')
    ->leftjoin('pelayaran','pelayaran.id','=','transaction.pelayaran_id')
    ->where('transaction.customer_id',$request->customerid)->get();
    $transactionnos = Transaction::select('id','trans_no')->orderby('id','DESC')->first();
    //dd($customers->id);
    return view('page_trans_new', ['customers'=> $customers, 'locations'=> $locations, 'consignees'=> $consignees, 'transactions'=> $transactions, 'transactionnos'=> $transactionnos]);
  }
}
