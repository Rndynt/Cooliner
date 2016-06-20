<?php

namespace App\Http\Controllers;
//use App\ApiRestoModel;
use App\Bookingdetail;
//use Cornford\Googlmapper\Mapper;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
//use App\Http\Controllers\Controller;
//use App\Http\Requests;


use App\Apirestomodel;
use App\Booking;
use App\Restodata;
use App\Restoimage;
use App\Restomenu;
use App\User;
//use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Requests\RestoRequest;

class RestoApiController extends Controller
{
    public function getdataResto() {
        $resto = Restodata::orderBy('id', 'desc')->get();
        //$restoo = Restoimage::orderBy('id')->get();
        return response()->json([
            'list_resto' => $resto
        ]);
    }
    public function getprofilResto($id){
        $profile = Restodata::with('restoimage')->findOrFail($id);
        //$profil = Restoimage::with('restodata')->where('restodata_id', $id)->get();
        return response()->json([
            'detail_resto' => $profile
        ]);
    }
    public function getmenuResto($id){
        //$menu
        $menus = Restomenu::where('resto_id', $id)->get();
        return response()->json($menus);
        //return view('dataresto.dataMenu', compact('menus', 'nama_resto'));
    }

    public function detailResto($id) {
        $resto = Restodata::find($id);
        return response()->json($resto);
    }

    public function saveResto(Request $request) {
        $resto = Restodata::create($request->all());
        return response()->json($resto);
    }

    public function deleteResto($id) {
        $resto = Restodata::find($id);
        $resto->delete();
        return response()->json(array(
            'success' => true,
        ));
    }

    public function updateResto(Request $request, $id) {
        $resto = Restodata::find($id);
        $input = $request->all();
        $resto->update($input);
        return response()->json($resto);
    }

    //---- PROFIL ----//
    public function profil_resto($id){
        $profile = Restodata::findOrFail($id);
        $profil = Restoimage::with('restodata')->where('restodata_id', $id)->get();
        return response()->json($profil);
        //return view('dataresto.profil', compact('profile','profil'));
    }
    //---- END PROFIL ----//

    //---- MENU -----//
    public function menu($id){
        $menus = Restomenu::with('restodata')->where('restodata_id', 31)->get();
        return response()->json($menus);
        //return view('dataresto.dataMenu', compact('menus', 'nama_resto'));
    }
    //---- END MENU ----//


    //---BOOKING---//
    public function getBooking(){
        $daftarresto = Restodata::all();
        return view('pesan', compact('daftarresto'));
    }

    public function getprofil($id){
        $lat = Restodata::findOrFail($id);
        $yLong = $lat->y_longitude;
        $xLat = $lat->x_latitude;
        //echo $yLong, $xLat;
        //break;
     $resto = Mapper::map($yLong,$xLat,['zoom'=>15, 'center'=> false]);
        $mapRender = $resto->render();
        $profile = Restodata::with('restoimage')->findOrFail($id);
        //return response()->json($profile);
        return view('pesan1', compact('profile', 'mapRender'));
    }

//    function test8(){
//
//        return view('pesan1', compact($resto));
//    }

    public function getmenu($id){
        $restoo = Restodata::findOrFail($id);
        //$booking->resto_id = $id;
        $menus = Restomenu::where('resto_id', $id)->with('restodata')->get();

        return view('pesan2', compact('menus','restoo'));
    }

    public function postBooking(Request $request)
    {
        //$resto = Restodata::findOrFail($id);
        $booking = new Booking;
        $booking->resto_id = $request->input('resto_id') ;
        $booking->user_id =  $request->input('user_id') ;    // Auth::user()->id;
        $booking->status = 0;
        $booking->save();
        foreach ($request->input('qty') as $key => $value) {
            if (!empty($value)) {
                $detailbooking = new Bookingdetail;
                $detailbooking->id_booking = $booking->id;
                $detailbooking->id_menu = $key;
                $detailbooking->qty = $value;
                $detailbooking->save();
            }
        }
    }


    public function joni(Request $request){
        //return $request->input('qty');
        $booking = new Booking;
        $booking->resto_id = 54;
        $booking->user_id = 15;
        $booking->status = 1;
        $booking->save();

        foreach($request->input('qty') as $key => $value) {
            if(!empty($value))
            {
                $detailbooking = new Bookingdetail;
                $detailbooking->id_booking = $booking->id;
                $detailbooking->id_menu = $key;
                $detailbooking->qty = $value;
                $detailbooking->save();
            }


        }
    }
}
