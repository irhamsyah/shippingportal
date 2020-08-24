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
     public function news_detail_view(Request $request)
     {
       //get id news from url
       $newss = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
       ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
       ->leftjoin('users', 'users.id', '=', 'news.id_user')
       ->where('id','=',$request->route('id'))
       ->orderBy('news.created_at','desc')->get();

       return view('news_detail.html', ['newss'=> $newss]);
     }

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
      $newss = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
      ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
      ->leftjoin('users', 'users.id', '=', 'news.id_user')
      ->orderBy('news.created_at','desc')->get();

      //get data newscategory
      $news_categorys = NewsCategory::select('news_category.id','news_category.name')->get();

      return view('admin/news', ['newss'=> $newss,'news_categorys'=> $news_categorys]);
    }
    public function admin_news_add(Request $request)
    {
      //cek validasi image
        $this->validate($request, [
          'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      //upload image to directory
      if ($request->hasFile('inputImage')) {
          $image = $request->file('inputImage');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/img/news');
          $image->move($destinationPath, $name);
      }
      //input new news
      $newss = new News;
      $newss->title = $request->inputTitle2;
      $newss->text = $request->inputText2;
      $newss->img_title = $name;
      $newss->news_category_id = $request->inputIdCategory;
      $newss->id_user = $request->inputIdUser;
      $newss->created_at = date('Y-m-d H:i:s');
      $newss->save();

      $newss = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
      ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
      ->leftjoin('users', 'users.id', '=', 'news.id_user')
      ->orderBy('news.created_at','desc')->get();

      //get data newscategory
      $news_categorys = NewsCategory::select('news_category.id','news_category.name')->get();

      return view('admin/news', ['newss'=> $newss,'news_categorys'=> $news_categorys]);
    }
    public function admin_news_edit(Request $request)
    {
      if ($request->inputImage!="" OR $request->inputImage=NULL){
        //cek validasi image
        $this->validate($request, [
            'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //upload image to directory
        if ($request->hasFile('inputImage')) {
            $image = $request->file('inputImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/news');
            $image->move($destinationPath, $name);
            //delete file image from directory
            unlink($_SERVER['DOCUMENT_ROOT'].'/img/news/'.$request->inputImgOld);
        }
      }else {
        $name = $request->inputImgOld;
      }
      //update news
      //dd($request->inputIdNews);
      $newss = News::find($request->inputIdNews);
      $newss->title = $request->inputTitle1;
      $newss->text = $request->inputText1;
      $newss->img_title = $name;
      $newss->news_category_id = $request->inputIdCategory;
      $newss->id_user = $request->inputIdUser;
      $newss->created_at = date('Y-m-d H:i:s');
      $newss->save();

      $newss = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
      ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
      ->leftjoin('users', 'users.id', '=', 'news.id_user')
      ->orderBy('news.created_at','desc')->get();

      //get data newscategory
      $news_categorys = NewsCategory::select('news_category.id','news_category.name')->get();
      return view('admin/news', ['newss'=> $newss,'news_categorys'=> $news_categorys]);
    }
    //Direct to Proses DeleteNews
    public function admin_news_destroy(Request $request)
    {
      $newss = News::find($request->inputIdNews);
      $newss->delete();

      $newss = News::select('news.id as news_id','news.title','news.text','news.img_title','news.id_user','news.news_category_id','news_category.name as category_name','users.name as user_name')
      ->leftJoin('news_category', 'news_category.id', '=', 'news.news_category_id')
      ->leftjoin('users', 'users.id', '=', 'news.id_user')
      ->orderBy('news.created_at','desc')->get();

      $news_categorys = NewsCategory::select('news_category.id','news_category.name')->get();
      return view('admin/news', ['newss'=> $newss,'news_categorys'=> $news_categorys]);
    }
    public function admin_news_category()
    {
      $news_categorys = NewsCategory::select('news_category.id','news_category.name','users.name as user_name')
      ->leftjoin('users','users.id','=','news_category.id_user')->get();
      //dd($news_categorys);
      return view('admin/news_category', ['news_categorys'=> $news_categorys]);
    }
    public function admin_news_category_add(Request $request)
    {
      //input new news category
      $newscategory = new NewsCategory;
      $newscategory->name = $request->inputNewsCategory;
      $newscategory->id_user = $request->inputIdUser;
      $newscategory->created_at = date('Y-m-d H:i:s');
      $newscategory->save();

      $news_categorys = NewsCategory::select('news_category.id','news_category.name','users.name as user_name')
      ->leftjoin('users','users.id','=','news_category.id_user')->get();

      return view('admin/news_category', ['news_categorys'=> $news_categorys]);
    }
    public function admin_news_category_edit(Request $request)
    {
      //update news category
      $newscategory = NewsCategory::find($request->inputIdCategory);
      $newscategory->name = $request->inputNewsCategory;
      $newscategory->id_user = $request->inputIdUser;
      $newscategory->created_at = date('Y-m-d H:i:s');
      $newscategory->save();

      $news_categorys = NewsCategory::select('news_category.id','news_category.name','users.name as user_name')
      ->leftjoin('users','users.id','=','news_category.id_user')->get();

      return view('admin/news_category', ['news_categorys'=> $news_categorys]);
    }
    //Direct to Proses DeleteNewsCategory
    public function admin_news_category_destroy(Request $request)
    {
      //dd($request->inputIdCategory);
      $newscategory = NewsCategory::find($request->inputIdCategory);
      $newscategory->delete();

      $news_categorys = NewsCategory::select('news_category.id','news_category.name','users.name as user_name')
      ->leftjoin('users','users.id','=','news_category.id_user')->get();

      return view('admin/news_category', ['news_categorys'=> $news_categorys]);
    }
    public function admin_news_image()
    {
      $news_images = NewsImage::select('news_image.id as id_image','news_image.img','news_image.news_id','news.title','users.name as user_name')
      ->leftjoin('news','news.id','=','news_image.news_id')
      ->leftjoin('users','users.id','=','news_image.id_user')->get();

      $newss = News::select('news.id as news_id','news.title')->orderby('news.title')->get();

      return view('admin/news_image', ['news_images'=> $news_images, 'newss'=> $newss]);
    }
    public function admin_news_image_add(Request $request)
    {
      //cek validasi image
        $this->validate($request, [
          'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      //upload image to directory
      if ($request->hasFile('inputImage')) {
          $image = $request->file('inputImage');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/img/news');
          $image->move($destinationPath, $name);
      }
      //input new news image
      $news_images = new NewsImage;
      $news_images->img = $name;
      $news_images->news_id = $request->inputTitleNews;
      $news_images->id_user = $request->inputIdUser;
      $news_images->created_at = date('Y-m-d H:i:s');
      $news_images->save();

      $news_images = NewsImage::select('news_image.id as id_image','news_image.img','news_image.news_id','news.title','users.name as user_name')
      ->leftjoin('news','news.id','=','news_image.news_id')
      ->leftjoin('users','users.id','=','news_image.id_user')->get();

      $newss = News::select('news.id as news_id','news.title')->orderby('news.title')->get();

      return view('admin/news_image', ['news_images'=> $news_images, 'newss'=> $newss]);
    }
    public function admin_news_image_edit(Request $request)
    {
      if ($request->inputImage!="" OR $request->inputImage=NULL){
        //cek validasi image
        $this->validate($request, [
            'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //upload image to directory
        if ($request->hasFile('inputImage')) {
            $image = $request->file('inputImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/news');
            $image->move($destinationPath, $name);
            //delete file image from directory
            unlink($_SERVER['DOCUMENT_ROOT'].'/img/news/'.$request->inputImgOld);
        }
      }else {
        $name = $request->inputImgOld;
      }
      //input new news image
      $news_images = NewsImage::find($request->inputIdNewsImg);;
      $news_images->img = $name;
      $news_images->news_id = $request->inputTitleNews;
      $news_images->id_user = $request->inputIdUser;
      $news_images->created_at = date('Y-m-d H:i:s');
      $news_images->save();

      $news_images = NewsImage::select('news_image.id as id_image','news_image.img','news_image.news_id','news.title','users.name as user_name')
      ->leftjoin('news','news.id','=','news_image.news_id')
      ->leftjoin('users','users.id','=','news_image.id_user')->get();

      $newss = News::select('news.id as news_id','news.title')->orderby('news.title')->get();

      return view('admin/news_image', ['news_images'=> $news_images, 'newss'=> $newss]);
    }
    //Direct to Proses DeleteNews
    public function admin_news_image_destroy(Request $request)
    {
      $news_images = NewsImage::find($request->inputIdNewsImg);
      $news_images->delete();

      $news_images = NewsImage::select('news_image.id as id_image','news_image.img','news_image.news_id','news.title','users.name as user_name')
      ->leftjoin('news','news.id','=','news_image.news_id')
      ->leftjoin('users','users.id','=','news_image.id_user')->get();

      $newss = News::select('news.id as news_id','news.title')->orderby('news.title')->get();

      return view('admin/news_image', ['news_images'=> $news_images, 'newss'=> $newss]);
    }
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
    public function admin_agent()
    {
      $agents = Agent::select('agent.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','agent.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/agent', ['agents'=> $agents,'locations'=> $locations]);
    }
    public function admin_agent_add(Request $request)
    {
      $agents = new Agent;
      $agents->code_agent = $request->inputAgentCode;
      $agents->name_agent = $request->inputAgentName;
      $agents->address = $request->inputAddress;
      $agents->id_city = $request->inputIdCity;
      $agents->postal = $request->inputPostal;
      $agents->telp = $request->inputTelp;
      $agents->fax = $request->inputFax;
      $agents->npwp = $request->inputNPWP;
      $agents->pkp_no = $request->inputPkp;
      $agents->desc_agent = $request->inputAgentDesc;
      $agents->payment_term = $request->inputTOP;
      $agents->name_person = $request->inputPersonName;
      $agents->phone_person = $request->inputPersonEmail;
      $agents->email_person = $request->inputPersonPhone;
      $agents->fax_person = $request->inputPersonFax;
      $agents->created_at = date('Y-m-d H:i:s');
      $agents->save();

      $agents = Agent::select('agent.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','agent.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/agent', ['agents'=> $agents,'locations'=> $locations]);
    }
    public function admin_agent_edit(Request $request)
    {
      //update Agent
      $agents = Agent::find($request->inputIdAgent);
      $agents->code_agent = $request->inputAgentCode;
      $agents->name_agent = $request->inputAgentName;
      $agents->address = $request->inputAddress;
      $agents->id_city = $request->inputIdCity;
      $agents->postal = $request->inputPostal;
      $agents->telp = $request->inputTelp;
      $agents->fax = $request->inputFax;
      $agents->npwp = $request->inputNPWP;
      $agents->pkp_no = $request->inputPkp;
      $agents->desc_agent = $request->inputAgentDesc;
      $agents->payment_term = $request->inputTOP;
      $agents->name_person = $request->inputPersonName;
      $agents->phone_person = $request->inputPersonEmail;
      $agents->email_person = $request->inputPersonPhone;
      $agents->fax_person = $request->inputPersonFax;
      $agents->updated_at = date('Y-m-d H:i:s');
      $agents->save();

      $agents = Agent::select('agent.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','agent.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/agent', ['agents'=> $agents,'locations'=> $locations]);
    }
    //Direct to Proses DeleteAgent
    public function admin_agent_destroy(Request $request)
    {
      $agents = Agent::find($request->inputIdAgent);
      $agents->delete();

      $agents = Agent::select('agent.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','agent.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/agent', ['agents'=> $agents,'locations'=> $locations]);
    }
    public function admin_bank_account()
    {
      $banks = BankAccount::select('bank_account.*','agent.code_agent','agent.name_agent')->leftjoin('agent','agent.id','=','bank_account.agent_id')->get();
      $agents = Agent::select('agent.id','agent.name_agent','agent.code_agent')->get();

      return view('admin/bank_account', ['banks'=> $banks,'agents'=> $agents]);
    }
    public function admin_bank_account_add(Request $request)
    {
      $banks = new BankAccount;
      $banks->bank_name = $request->inputBankName;
      $banks->bank_account = $request->inputBankAccount;
      $banks->branch = $request->inputBranch;
      $banks->account_name = $request->inputAccountName;
      $banks->bank_address = $request->inputBankAddress;
      $banks->agent_id = $request->inputIdAgent;
      $banks->created_at = date('Y-m-d H:i:s');
      $banks->save();

      $banks = BankAccount::select('bank_account.*','agent.code_agent','agent.name_agent')->leftjoin('agent','agent.id','=','bank_account.agent_id')->get();
      $agents = Agent::select('agent.id','agent.name_agent','agent.code_agent')->get();

      return view('admin/bank_account', ['banks'=> $banks,'agents'=> $agents]);
    }
    public function admin_bank_account_edit(Request $request)
    {
      //update Bank Account
      $banks = BankAccount::find($request->inputIdBankAccount);
      $banks->bank_name = $request->inputBankName;
      $banks->bank_account = $request->inputBankAccount;
      $banks->branch = $request->inputBranch;
      $banks->account_name = $request->inputAccountName;
      $banks->bank_address = $request->inputBankAddress;
      $banks->agent_id = $request->inputIdAgent;
      $banks->created_at = date('Y-m-d H:i:s');
      $banks->save();

      $banks = BankAccount::select('bank_account.*','agent.code_agent','agent.name_agent')->leftjoin('agent','agent.id','=','bank_account.agent_id')->get();
      $agents = Agent::select('agent.id','agent.name_agent','agent.code_agent')->get();

      return view('admin/bank_account', ['banks'=> $banks,'agents'=> $agents]);
    }
    //Direct to Proses DeleteBankAccount
    public function admin_bank_account_destroy(Request $request)
    {
      $banks = BankAccount::find($request->inputIdBankAccount);
      $banks->delete();

      $banks = BankAccount::select('bank_account.*','agent.code_agent','agent.name_agent')->leftjoin('agent','agent.id','=','bank_account.agent_id')->get();
      $agents = Agent::select('agent.id','agent.name_agent','agent.code_agent')->get();

      return view('admin/bank_account', ['banks'=> $banks,'agents'=> $agents]);
    }
    public function admin_pelayaran()
    {
      $pelayarans = Pelayaran::select('pelayaran.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','pelayaran.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/pelayaran', ['pelayarans'=> $pelayarans,'locations'=> $locations]);
    }
    public function admin_pelayaran_add(Request $request)
    {
      $pelayarans = new Pelayaran;
      $pelayarans->code_pelayaran = $request->inputPelayaranCode;
      $pelayarans->name_pelayaran = $request->inputPelayaranName;
      $pelayarans->alias = $request->inputAlias;
      $pelayarans->address = $request->inputAddress;
      $pelayarans->id_city = $request->inputIdCity;
      $pelayarans->postal = $request->inputPostal;
      $pelayarans->telp = $request->inputTelp;
      $pelayarans->fax = $request->inputFax;
      $pelayarans->npwp = $request->inputNPWP;
      $pelayarans->pkp_no = $request->inputPkp;
      $pelayarans->desc_pelayaran = $request->inputPelayaranDesc;
      $pelayarans->payment_term = $request->inputTOP;
      $pelayarans->name_person = $request->inputPersonName;
      $pelayarans->phone_person = $request->inputPersonEmail;
      $pelayarans->email_person = $request->inputPersonPhone;
      $pelayarans->fax_person = $request->inputPersonFax;
      $pelayarans->created_at = date('Y-m-d H:i:s');
      $pelayarans->save();

      $pelayarans = Pelayaran::select('pelayaran.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','pelayaran.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/pelayaran', ['pelayarans'=> $pelayarans,'locations'=> $locations]);
    }
    public function admin_pelayaran_edit(Request $request)
    {
      //update Pelayaran
      $pelayarans = Pelayaran::find($request->inputIdPelayaran);
      $pelayarans->code_pelayaran = $request->inputPelayaranCode;
      $pelayarans->name_pelayaran = $request->inputPelayaranName;
      $pelayarans->alias = $request->inputAlias;
      $pelayarans->address = $request->inputAddress;
      $pelayarans->id_city = $request->inputIdCity;
      $pelayarans->postal = $request->inputPostal;
      $pelayarans->telp = $request->inputTelp;
      $pelayarans->fax = $request->inputFax;
      $pelayarans->npwp = $request->inputNPWP;
      $pelayarans->pkp_no = $request->inputPkp;
      $pelayarans->desc_pelayaran = $request->inputPelayaranDesc;
      $pelayarans->payment_term = $request->inputTOP;
      $pelayarans->name_person = $request->inputPersonName;
      $pelayarans->phone_person = $request->inputPersonEmail;
      $pelayarans->email_person = $request->inputPersonPhone;
      $pelayarans->fax_person = $request->inputPersonFax;
      $pelayarans->updated_at = date('Y-m-d H:i:s');
      $pelayarans->save();

      $pelayarans = Pelayaran::select('pelayaran.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','pelayaran.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/pelayaran', ['pelayarans'=> $pelayarans,'locations'=> $locations]);
    }
    //Direct to Proses DeletePelayaran
    public function admin_pelayaran_destroy(Request $request)
    {
      $pelayarans = Pelayaran::find($request->inputIdPelayaran);
      $pelayarans->delete();

      $pelayarans = Pelayaran::select('pelayaran.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','pelayaran.id_city')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/pelayaran', ['pelayarans'=> $pelayarans,'locations'=> $locations]);
    }
    public function admin_tarif()
    {
      $tarifs = Tarif::select('tarif.*','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran')->leftjoin('location','location.id','=','tarif.id_city')->leftjoin('pelayaran','pelayaran.id','=','tarif.pelayaran_id')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();
      $pelayarans = Pelayaran::select('pelayaran.id as pel_id','pelayaran.code_pelayaran','pelayaran.name_pelayaran')->orderby('pelayaran.code_pelayaran')->get();

      return view('admin/tarif', ['tarifs'=> $tarifs, 'pelayarans'=> $pelayarans, 'locations'=> $locations]);
    }
    public function admin_tarif_add(Request $request)
    {
      $tarifs = new Tarif;
      $tarifs->pelayaran_id = $request->inputIdPelayaran;
      $tarifs->id_city = $request->inputIdCity;
      $tarifs->price = $request->inputPrice;
      $tarifs->date = $request->inputDate1;
      $tarifs->pic_pelayaran = $request->inputPIC;
      $tarifs->last_price1 = $request->inputLastPrice1;
      $tarifs->last_price2 = $request->inputLastPrice2;
      $tarifs->last_price3 = $request->inputLastPrice3;
      $tarifs->created_at = date('Y-m-d H:i:s');
      $tarifs->save();

      $tarifs = Tarif::select('tarif.*','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran')->leftjoin('location','location.id','=','tarif.id_city')->leftjoin('pelayaran','pelayaran.id','=','tarif.pelayaran_id')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();
      $pelayarans = Pelayaran::select('pelayaran.id as pel_id','pelayaran.code_pelayaran','pelayaran.name_pelayaran')->orderby('pelayaran.code_pelayaran')->get();

      return view('admin/tarif', ['tarifs'=> $tarifs, 'pelayarans'=> $pelayarans, 'locations'=> $locations]);
    }
    public function admin_tarif_edit(Request $request)
    {
      //update Tarif
      $tarifs = Tarif::find($request->inputIdTarif);
      $tarifs->pelayaran_id = $request->inputIdPelayaran;
      $tarifs->id_city = $request->inputIdCity;
      $tarifs->price = $request->inputPrice;
      $tarifs->date = $request->inputDate2;
      $tarifs->pic_pelayaran = $request->inputPIC;
      //check price previous
      if ($request->inputPrice != $request->inputPrice_old){
        $tarifs->last_price1 = $request->inputPrice_old;
        $tarifs->last_price2 = $request->inputLastPrice1_old;
        $tarifs->last_price3 = $request->inputLastPrice2_old;
      }
      $tarifs->created_at = date('Y-m-d H:i:s');
      $tarifs->save();

      $tarifs = Tarif::select('tarif.*','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran')->leftjoin('location','location.id','=','tarif.id_city')->leftjoin('pelayaran','pelayaran.id','=','tarif.pelayaran_id')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();
      $pelayarans = Pelayaran::select('pelayaran.id as pel_id','pelayaran.code_pelayaran','pelayaran.name_pelayaran')->orderby('pelayaran.code_pelayaran')->get();

      return view('admin/tarif', ['tarifs'=> $tarifs, 'pelayarans'=> $pelayarans, 'locations'=> $locations]);
    }
    //Direct to Proses DeleteTarif
    public function admin_tarif_destroy(Request $request)
    {
      $tarifs = Tarif::find($request->inputIdTarif);
      $tarifs->delete();

      $tarifs = Tarif::select('tarif.*','location.name_city','location.province_city','pelayaran.code_pelayaran','pelayaran.name_pelayaran')->leftjoin('location','location.id','=','tarif.id_city')->leftjoin('pelayaran','pelayaran.id','=','tarif.pelayaran_id')->get();
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();
      $pelayarans = Pelayaran::select('pelayaran.id as pel_id','pelayaran.code_pelayaran','pelayaran.name_pelayaran')->orderby('pelayaran.code_pelayaran')->get();

      return view('admin/tarif', ['tarifs'=> $tarifs, 'pelayarans'=> $pelayarans, 'locations'=> $locations]);
    }
    public function admin_consignee()
    {
      $consignees = Consignee::select('consignee.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','consignee.id_city')->get();;
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/consignee', ['consignees'=> $consignees,'locations'=> $locations]);
    }
    public function admin_consignee_add(Request $request)
    {
      $consignees = new Consignee;
      $consignees->code_consignee = $request->inputConsigneeCode;
      $consignees->name_consignee = $request->inputConsigneeName;
      $consignees->address_invoice = $request->inputAddressInvoice;
      $consignees->address = $request->inputAddress;
      $consignees->id_city = $request->inputIdCity;
      $consignees->postal = $request->inputPostal;
      $consignees->telp = $request->inputTelp;
      $consignees->fax = $request->inputFax;
      $consignees->npwp = $request->inputNPWP;
      $consignees->pkp_no = $request->inputPkp;
      $consignees->desc_consignee = $request->inputConsigneeDesc;
      $consignees->payment_term = $request->inputTOP;
      $consignees->name_person = $request->inputPersonName;
      $consignees->phone_person = $request->inputPersonEmail;
      $consignees->email_person = $request->inputPersonPhone;
      $consignees->fax_person = $request->inputPersonFax;
      $consignees->created_at = date('Y-m-d H:i:s');
      $consignees->save();

      $consignees = Consignee::select('consignee.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','consignee.id_city')->get();;
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/consignee', ['consignees'=> $consignees,'locations'=> $locations]);
    }
    public function admin_consignee_edit(Request $request)
    {
      //update Consignee
      $consignees = Consignee::find($request->inputIdConsignee);
      $consignees->code_consignee = $request->inputConsigneeCode;
      $consignees->name_consignee = $request->inputConsigneeName;
      $consignees->address_invoice = $request->inputAddressInvoice;
      $consignees->address = $request->inputAddress;
      $consignees->id_city = $request->inputIdCity;
      $consignees->postal = $request->inputPostal;
      $consignees->telp = $request->inputTelp;
      $consignees->fax = $request->inputFax;
      $consignees->npwp = $request->inputNPWP;
      $consignees->pkp_no = $request->inputPkp;
      $consignees->desc_consignee = $request->inputConsigneeDesc;
      $consignees->payment_term = $request->inputTOP;
      $consignees->name_person = $request->inputPersonName;
      $consignees->phone_person = $request->inputPersonEmail;
      $consignees->email_person = $request->inputPersonPhone;
      $consignees->fax_person = $request->inputPersonFax;
      $consignees->created_at = date('Y-m-d H:i:s');
      $consignees->save();

      $consignees = Consignee::select('consignee.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','consignee.id_city')->get();;
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/consignee', ['consignees'=> $consignees,'locations'=> $locations]);
    }
    //Direct to Proses DeleteConsignee
    public function admin_consignee_destroy(Request $request)
    {
      $consignees = Consignee::find($request->inputIdConsignee);
      $consignees->delete();

      $consignees = Consignee::select('consignee.*','location.name_city','location.province_city')->leftjoin('location','location.id','=','consignee.id_city')->get();;
      $locations = Location::select('location.id as loc_id','location.code_city','location.name_city','location.province_city')->orderby('location.name_city')->get();

      return view('admin/consignee', ['consignees'=> $consignees,'locations'=> $locations]);
    }
    public function admin_trucking()
    {
      $truckings = TruckingType::all();
      return view('admin/trucking', ['truckings'=> $truckings]);
    }
    public function admin_trucking_add(Request $request)
    {
      $truckings = new TruckingType;
      $truckings->name_trucking = $request->inputTruckingName;
      $truckings->created_at = date('Y-m-d H:i:s');
      $truckings->save();

      $truckings = TruckingType::all();
      return view('admin/trucking', ['truckings'=> $truckings]);
    }
    public function admin_trucking_edit(Request $request)
    {
      //update Trucking
      $truckings = TruckingType::find($request->inputIdTrucking);
      $truckings->name_trucking = $request->inputTruckingName;
      $truckings->created_at = date('Y-m-d H:i:s');
      $truckings->save();

      $truckings = TruckingType::all();
      return view('admin/trucking', ['truckings'=> $truckings]);
    }
    //Direct to Proses DeleteTrucking
    public function admin_trucking_destroy(Request $request)
    {
      $truckings = TruckingType::find($request->inputIdTrucking);
      $truckings->delete();

      $truckings = TruckingType::all();
      return view('admin/trucking', ['truckings'=> $truckings]);
    }
    public function admin_vendor_truck()
    {
      $vendor_trucks = VendorTruck::select('vendor_truck.*','trucking_type.name_trucking')->leftjoin('trucking_type','trucking_type.id','=','vendor_truck.trucking_type_id')->get();
      $truckings = TruckingType::select('trucking_type.id as trucking_id','trucking_type.name_trucking')->orderby('trucking_type.name_trucking')->get();

      return view('admin/vendor_truck', ['vendor_trucks'=> $vendor_trucks,'truckings'=> $truckings]);
    }
    public function admin_vendor_truck_add(Request $request)
    {
      $vendor_trucks = new VendorTruck;
      $vendor_trucks->code_vendor = $request->inputVendorCode;
      $vendor_trucks->name_vendor = $request->inputVendorName;
      $vendor_trucks->address = $request->inputAddress;
      $vendor_trucks->telp = $request->inputTelp;
      $vendor_trucks->payment_term = $request->inputTOP;
      $vendor_trucks->trucking_type_id = $request->inputIdTruckingType;
      $vendor_trucks->created_at = date('Y-m-d H:i:s');
      $vendor_trucks->save();

      $vendor_trucks = VendorTruck::select('vendor_truck.*','trucking_type.name_trucking')->leftjoin('trucking_type','trucking_type.id','=','vendor_truck.trucking_type_id')->get();
      $truckings = TruckingType::select('trucking_type.id as trucking_id','trucking_type.name_trucking')->orderby('trucking_type.name_trucking')->get();

      return view('admin/vendor_truck', ['vendor_trucks'=> $vendor_trucks,'truckings'=> $truckings]);
    }
    public function admin_vendor_truck_edit(Request $request)
    {
      //update VendorTruck
      $vendor_trucks = VendorTruck::find($request->inputIdVendorTruck);
      $vendor_trucks->code_vendor = $request->inputVendorCode;
      $vendor_trucks->name_vendor = $request->inputVendorName;
      $vendor_trucks->address = $request->inputAddress;
      $vendor_trucks->telp = $request->inputTelp;
      $vendor_trucks->payment_term = $request->inputTOP;
      $vendor_trucks->trucking_type_id = $request->inputIdTruckingType;
      $vendor_trucks->created_at = date('Y-m-d H:i:s');
      $vendor_trucks->save();

      $vendor_trucks = VendorTruck::select('vendor_truck.*','trucking_type.name_trucking')->leftjoin('trucking_type','trucking_type.id','=','vendor_truck.trucking_type_id')->get();
      $truckings = TruckingType::select('trucking_type.id as trucking_id','trucking_type.name_trucking')->orderby('trucking_type.name_trucking')->get();

      return view('admin/vendor_truck', ['vendor_trucks'=> $vendor_trucks,'truckings'=> $truckings]);
    }
    //Direct to Proses Delete VendorTruck
    public function admin_vendor_truck_destroy(Request $request)
    {
      $vendor_trucks = VendorTruck::find($request->inputIdVendorTruck);
      $vendor_trucks->delete();

      $vendor_trucks = VendorTruck::select('vendor_truck.*','trucking_type.name_trucking')->leftjoin('trucking_type','trucking_type.id','=','vendor_truck.trucking_type_id')->get();
      $truckings = TruckingType::select('trucking_type.id as trucking_id','trucking_type.name_trucking')->orderby('trucking_type.name_trucking')->get();

      return view('admin/vendor_truck', ['vendor_trucks'=> $vendor_trucks,'truckings'=> $truckings]);
    }
    public function admin_location()
    {
      $locations = Location::all();

      return view('admin/location', ['locations'=> $locations]);
    }
    public function admin_location_add(Request $request)
    {
      $locations = new Location;
      $locations->code_city = $request->inputCityCode;
      $locations->name_city = $request->inputCityName;
      $locations->province_city = $request->inputProvince;
      $locations->status_loading = $request->inputStatusLoading;
      $locations->status_pelayaran = $request->inputStatusPelayaran;
      $locations->created_at = date('Y-m-d H:i:s');
      $locations->save();

      $locations = Location::all();

      return view('admin/location', ['locations'=> $locations]);
    }
    public function admin_location_edit(Request $request)
    {
      //update location
      $locations = Location::find($request->inputIdLocation);
      $locations->code_city = $request->inputCityCode;
      $locations->name_city = $request->inputCityName;
      $locations->province_city = $request->inputProvince;
      $locations->status_loading = $request->inputStatusLoading;
      $locations->status_pelayaran = $request->inputStatusPelayaran;
      $locations->created_at = date('Y-m-d H:i:s');
      $locations->save();

      $locations = Location::all();

      return view('admin/location', ['locations'=> $locations]);
    }
    //Direct to Proses Delete location
    public function admin_location_destroy(Request $request)
    {
      $locations = Location::find($request->inputIdLocation);
      $locations->delete();

      $locations = Location::all();

      return view('admin/location', ['locations'=> $locations]);
    }
}
