<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Users;
use App\Testimoni;
use App\Slider;

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
      //get data Slider
      $sliders = Slider::all();

      return view('admin/slider', ['sliders'=> $sliders]);
    }
    //Direct to Slider page
    public function admin_slider()
    {
      //get data Slider
      $sliders = Slider::all();

      return view('admin/slider', ['sliders'=> $sliders]);
    }
    public function admin_slider_add(Request $request)
    {
      //cek validasi image
        $this->validate($request, [
          'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      //upload image to directory
      if ($request->hasFile('inputImage')) {
          $image = $request->file('inputImage');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/img/slider');
          $image->move($destinationPath, $name);
      }
      //input new Slider
      $sliders = new Slider;
      $sliders->img_title = $name;
      $sliders->created_at = date('Y-m-d H:i:s');
      $sliders->save();

      //get data Slider
      $sliders = Slider::all();

      return view('admin/slider', ['sliders'=> $sliders]);
    }
    public function admin_slider_edit(Request $request)
    {
      if ($request->inputImage!="" OR $request->inputImage!=NULL){
        //cek validasi image
        $this->validate($request, [
            'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //upload image to directory
        if ($request->hasFile('inputImage')) {
            $image = $request->file('inputImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/slider');
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

      return view('admin/slider', ['sliders'=> $sliders]);
    }
    //Direct to Proses Deleteslider
    public function admin_slider_destroy(Request $request)
    {
      $sliders = Slider::find($request->inputIdSlider);
      $sliders->delete();

      //delete file image from directory
      unlink($_SERVER['DOCUMENT_ROOT'].'/img/slider/'.$request->inputImgOld);

      //get data Slider
      $sliders = Slider::all();
      return view('admin/slider', ['sliders'=> $sliders]);
    }
    //Direct to Testimoni page
    public function admin_testimoni()
    {
      //get data Testimoni
      $testimonis = Testimoni::all();

      return view('admin/testimoni', ['testimonis'=> $testimonis]);
    }
    public function admin_testimoni_add(Request $request)
    {
      //cek validasi image
        $this->validate($request, [
          'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      //upload image to directory
      if ($request->hasFile('inputImage')) {
          $image = $request->file('inputImage');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/img/testimoni');
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

      return view('admin/testimoni', ['testimonis'=> $testimonis]);
    }
    public function admin_testimoni_edit(Request $request)
    {
      if ($request->inputImage!="" OR $request->inputImage!=NULL){
        //cek validasi image
        $this->validate($request, [
            'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //upload image to directory
        if ($request->hasFile('inputImage')) {
            $image = $request->file('inputImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/testimoni');
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

      return view('admin/testimoni', ['testimonis'=> $testimonis]);
    }
    //Direct to Proses Deleteslider
    public function admin_testimoni_destroy(Request $request)
    {
      $testimonis = Testimoni::find($request->inputIdTestimoni);
      $testimonis->delete();

      //delete file image from directory
      unlink($_SERVER['DOCUMENT_ROOT'].'/img/testimoni/'.$request->inputImgOld);

      //get data Testimoni
      $testimonis = Testimoni::all();

      return view('admin/testimoni', ['testimonis'=> $testimonis]);
    }
}
