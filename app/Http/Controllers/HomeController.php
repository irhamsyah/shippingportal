<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Users;
use App\Testimoni;
use App\Slider;
use App\Service;
use App\Agent;
use App\Customer;
use App\Location;
use App\Pelayaran;
use App\Transaction;
use App\TransactionDetail;
use App\TruckingType;
use App\VendorTruck;
use App\Logo;

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
      $logos = Logo::all();
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

      return view('admin/transaction', ['logos'=> $logos,'transactions'=> $transactions, 'vendors'=> $vendors, 'pelayarans'=> $pelayarans, 'agents'=> $agents, 'locations'=> $locations]);
    }
    //Direct to Slider page
    public function admin_slider()
    {
      $logos = Logo::all();
      //get data Slider
      $sliders = Slider::all();

      return view('admin/slider', ['logos'=> $logos,'sliders'=> $sliders]);
    }
    public function admin_slider_add(Request $request)
    {
      $logos = Logo::all();
      //cek validasi image
        $this->validate($request, [
          'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      //upload image to directory
      if ($request->hasFile('inputImage')) {
          $image = $request->file('inputImage');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/img/slider';
          $image->move($destinationPath, $name);
      }
      //input new Slider
      $sliders = new Slider;
      $sliders->img_title = $name;
      $sliders->created_at = date('Y-m-d H:i:s');
      $sliders->save();

      //get data Slider
      $sliders = Slider::all();

      return view('admin/slider', ['logos'=> $logos,'sliders'=> $sliders]);
    }
    public function admin_slider_edit(Request $request)
    {
      $logos = Logo::all();
      if ($request->inputImage!="" OR $request->inputImage!=NULL){
        //cek validasi image
        $this->validate($request, [
            'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //upload image to directory
        if ($request->hasFile('inputImage')) {
            $image = $request->file('inputImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/img/slider';
            $image->move($destinationPath, $name);
            //delete file image from directory
            unlink($_SERVER['DOCUMENT_ROOT'].'/img/slider/'.$request->inputImgOld);
        }
      }else {
        $name = $request->inputImgOld;
      }
      //update Slider
      //dd($request->inputIdSlider);
      $sliders = Slider::find($request->inputIdSlider);
      $sliders->img_title = $name;
      $sliders->created_at = date('Y-m-d H:i:s');
      $sliders->save();

      //get data Slider
      $sliders = Slider::all();

      return view('admin/slider', ['logos'=> $logos,'sliders'=> $sliders]);
    }
    //Direct to Proses Deleteslider
    public function admin_slider_destroy(Request $request)
    {
      $logos = Logo::all();
      $sliders = Slider::find($request->inputIdSlider);
      $sliders->delete();

      //delete file image from directory
      unlink($_SERVER['DOCUMENT_ROOT'].'/img/slider/'.$request->inputImgOld);

      //get data Slider
      $sliders = Slider::all();
      return view('admin/slider', ['logos'=> $logos,'sliders'=> $sliders]);
    }
    //Direct to Testimoni page
    public function admin_testimoni()
    {
      $logos = Logo::all();
      //get data Testimoni
      $testimonis = Testimoni::all();

      return view('admin/testimoni', ['logos'=> $logos,'testimonis'=> $testimonis]);
    }
    public function admin_testimoni_add(Request $request)
    {
      $logos = Logo::all();
      //cek validasi image
        $this->validate($request, [
          'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      //upload image to directory
      if ($request->hasFile('inputImage')) {
          $image = $request->file('inputImage');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/img/testimoni';
          $image->move($destinationPath, $name);
      }
      //input new Testimoni
      $testimonis = new Testimoni;
      $testimonis->name = $request->inputName;
      $testimonis->position = $request->inputPosition;
      $testimonis->testimoni = $request->inputTitle1;
      $testimonis->img_testimoni = $name;
      $testimonis->id_user = $request->inputIdUser;
      $testimonis->created_at = date('Y-m-d H:i:s');
      $testimonis->save();

      //get data Testimoni
      $testimonis = Testimoni::all();

      return view('admin/testimoni', ['logos'=> $logos,'testimonis'=> $testimonis]);
    }
    public function admin_testimoni_edit(Request $request)
    {
      $logos = Logo::all();
      if ($request->inputImage!="" OR $request->inputImage!=NULL){
        //cek validasi image
        $this->validate($request, [
            'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //upload image to directory
        if ($request->hasFile('inputImage')) {
            $image = $request->file('inputImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/img/testimoni';
            $image->move($destinationPath, $name);
            //delete file image from directory
            unlink($_SERVER['DOCUMENT_ROOT'].'/img/testimoni/'.$request->inputImgOld);
        }
      }else {
        $name = $request->inputImgOld;
      }
      //update Testimoni
      $testimonis = Testimoni::find($request->inputIdTestimoni);
      $testimonis->name = $request->inputName;
      $testimonis->position = $request->inputPosition;
      $testimonis->testimoni = $request->inputText1;
      $testimonis->img_testimoni = $name;
      $testimonis->id_user = $request->inputIdUser;
      $testimonis->created_at = date('Y-m-d H:i:s');
      $testimonis->save();

      //get data Testimoni
      $testimonis = Testimoni::all();

      return view('admin/testimoni', ['logos'=> $logos,'testimonis'=> $testimonis]);
    }
    //Direct to Proses Deleteslider
    public function admin_testimoni_destroy(Request $request)
    {
      $logos = Logo::all();
      $testimonis = Testimoni::find($request->inputIdTestimoni);
      $testimonis->delete();

      //delete file image from directory
      unlink($_SERVER['DOCUMENT_ROOT'].'/img/testimoni/'.$request->inputImgOld);

      //get data Service
      $testimonis = Testimoni::all();

      return view('admin/testimoni', ['logos'=> $logos,'testimonis'=> $testimonis]);
    }
    //Direct to Service page
    public function admin_service()
    {
      $logos = Logo::all();
      //get data Service
      $services = Service::all();

      return view('admin/service', ['logos'=> $logos,'services'=> $services]);
    }
    public function admin_service_add(Request $request)
    {
      $logos = Logo::all();
      //cek validasi image
        $this->validate($request, [
          'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      //upload image to directory
      if ($request->hasFile('inputImage')) {
          $image = $request->file('inputImage');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/img/service';
          $image->move($destinationPath, $name);
      }
      //input new service
      $services = new Service;
      $services->title = $request->inputTitle;
      $services->detail_id = $request->inputText2;
      $services->detail_en = $request->inputTitle2;
      $services->img_title = $name;
      $services->id_user = $request->inputIdUser;
      $services->created_at = date('Y-m-d H:i:s');
      $services->save();

      //get data Service
      $services = Service::all();

      return view('admin/service', ['logos'=> $logos,'services'=> $services]);
    }
    public function admin_service_edit(Request $request)
    {
      $logos = Logo::all();
      if ($request->inputImage!="" OR $request->inputImage!=NULL){
        //cek validasi image
        $this->validate($request, [
            'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //upload image to directory
        if ($request->hasFile('inputImage')) {
            $image = $request->file('inputImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/img/service';
            $image->move($destinationPath, $name);
            //delete file image from directory
            unlink($_SERVER['DOCUMENT_ROOT'].'/img/service/'.$request->inputImgOld);
        }
      }else {
        $name = $request->inputImgOld;
      }
      //update Testimoni
      $services = Service::find($request->inputIdService);
      $services->title = $request->inputTitle;
      $services->detail_id = $request->inputText1;
      $services->detail_en = $request->inputTitle1;
      $services->img_title = $name;
      $services->id_user = $request->inputIdUser;
      $services->created_at = date('Y-m-d H:i:s');
      $services->save();

      //get data Service
      $services = Service::all();

      return view('admin/service', ['logos'=> $logos,'services'=> $services]);
    }
    //Direct to Proses Delete service
    public function admin_service_destroy(Request $request)
    {
      $logos = Logo::all();
      $services = Service::find($request->inputIdService);
      $services->delete();

      //delete file image from directory
      unlink($_SERVER['DOCUMENT_ROOT'].'/img/service/'.$request->inputImgOld);

      //get data Service
      $services = Service::all();

      return view('admin/service', ['logos'=> $logos,'services'=> $services]);
    }
}
