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

class HomeController extends Controller
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
    public function admin_index()
    {
        return view('admin/tracking');
    }
    public function admin_tracking()
    {
        return view('admin/tracking');
    }
    public function admin_news()
    {
      $newss = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.id_category','news_category.name as category_name','users.name as user_name')
      ->leftJoin('news_category', 'news_category.id', '=', 'news.id_category')
      ->leftjoin('users', 'users.id', '=', 'news.id_user')
      ->orderBy('news.created_at','desc')->get();
      //dd($news);
      return view('admin/news', ['newss'=> $newss]);
    }
    public function admin_news_category()
    {
      $news_categorys = NewsCategory::select('news_category.id','news_category.name','users.name as user_name')
      ->leftjoin('users','users.id','=','news_category.id_user')->get();
      //dd($news_categorys);
      return view('admin/news_category', ['news_categorys'=> $news_categorys]);
    }
    public function admin_news_image()
    {
      $news_images = NewsImage::select('news_image.id as id_image','news_image.img','news_image.id_news','news.title','users.name as user_name')
      ->leftjoin('news','news.id','=','news_image.id_news')
      ->leftjoin('users','users.id','=','news_image.id_user')->get();
      //dd($news_images);
      return view('admin/news_image', ['news_images'=> $news_images]);
    }
    public function admin_customer()
    {
      $customers = Customer::select('customer.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','customer.id_city')->get();
      //dd($customers);
      return view('admin/customer', ['customers'=> $customers]);
    }
    public function admin_agent()
    {
      $agents = Agent::select('agent.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','agent.id_city')->get();
      //dd($agents);
      return view('admin/agent', ['agents'=> $agents]);
    }
    public function admin_bank_account()
    {
      $banks = BankAccount::select('bank_account.*','agent.code_agent','agent.name_agent')->leftjoin('agent','agent.id','=','bank_account.id_agent')->get();
      //dd($banks);
      return view('admin/bank_account', ['banks'=> $banks]);
    }
    public function admin_pelayaran()
    {
      $pelayarans = Pelayaran::select('pelayaran.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','pelayaran.id_city')->get();
      //dd($pelayarans);
      return view('admin/pelayaran', ['pelayarans'=> $pelayarans]);
    }
    public function admin_location()
    {
      $locations = Location::all();
      //dd($locations);
      return view('admin/location', ['locations'=> $locations]);
    }
    public function admin_vendor_truck()
    {
      $vendor_trucks = VendorTruck::select('vendor_truck.*','trucking_type.name_trucking')->leftjoin('trucking_type','trucking_type.id','=','vendor_truck.id_truck_type')->get();
      //dd($vendor_trucks);
      return view('admin/vendor_truck', ['vendor_trucks'=> $vendor_trucks]);
    }
    public function admin_trucking()
    {
      $truckings = TruckingType::all();
      //dd($truckings);
      return view('admin/trucking', ['truckings'=> $truckings]);
    }
    public function admin_consignee()
    {
      $consignees = Consignee::select('consignee.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','consignee.id_city')->get();;
      //dd($consignees);
      return view('admin/consignee', ['consignees'=> $consignees]);
    }
    public function admin_tarif()
    {
      $tarifs = Tarif::select('tarif.*','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran')->leftjoin('location','location.id','=','tarif.id_city')->leftjoin('pelayaran','pelayaran.id','=','tarif.id_pelayaran')->get();;
      //dd($tarifs);
      return view('admin/tarif', ['tarifs'=> $tarifs]);
    }
}
