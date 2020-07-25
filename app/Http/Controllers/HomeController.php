<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Users;
use App\News;
use App\News_category;
use App\News_image;

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
      $news_categorys = News_category::select('news_category.id','news_category.name','users.name as user_name')
      ->leftjoin('users','users.id','=','news_category.id_user')->get();
      //dd($news_categorys);
      return view('admin/news_category', ['news_categorys'=> $news_categorys]);
    }
    public function admin_news_image()
    {
      $news_images = News_image::select('news_image.id as id_image','news_image.img','news_image.id_news','news.title','users.name as user_name')
      ->leftjoin('news','news.id','=','news_image.id_news')
      ->leftjoin('users','users.id','=','news_image.id_user')->get();
      //dd($news_images);
      return view('admin/news_image', ['news_images'=> $news_images]);
    }
}
