<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Users;
use App\Location;
use App\Pelayaran;
use App\Tarif;

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

class PelayaranController extends Controller
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
}
