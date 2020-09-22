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
  public function contact(){ return view('page_contact'); }
  public function tracking(){ return view('page_tracking'); }

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
}
