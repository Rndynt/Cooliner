<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Dataresto;
use App\Booking;
use App\Bookingdetail;
use App\Restodata;
use App\Restoimage;
use App\Restomenu;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Requests\RestoRequest;
use Laracasts\Flash\Flash;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class RestoController extends Controller
{

    public function detail($id){
        $detail = Restodata::findOrFail($id);
        return view('dataresto.detailResto', compact('detail'));
    }

    public function create(){
        return view('dataresto.addResto');
    }

    public function store(RestoRequest $request){
        Restodata::create($request->all());
        return redirect('resto');
    }

    public function edit_data_resto($id){
        $resto = Restodata::findOrFail($id);
        return view('dataresto.editResto', compact('resto'));
    }

    public function update_data($id, RestoRequest $request){
        $resto = Restodata::findOrFail($id);
        $resto->update($request->all());

        return redirect('resto');
    }

    public function destroy($id){
        $resto = Restodata::find($id);
        $resto->delete();

        return redirect('resto');
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

    //---- PROFIL ----//
    public function profil_resto($id){
        $profile = Restodata::findOrFail($id);
        $yLong = $profile->y_longitude;
        $xLat = $profile->x_latitude;
        $resto = Mapper::map($yLong,$xLat,['zoom'=>15, 'center'=> false]);
        $mapRender = $resto->render();
        $profil = Restoimage::with('restodata')->where('resto_id', $id)->get();
        return view('dataresto.profil', compact('profile','profil', 'mapRender'));
    }
    //---- END PROFIL ----//


    //---- MENU -----//
    public function manage_menu($id){
        $nama_resto = Restodata::findOrFail($id);
         $menus = Restomenu::with('restodata')->where('resto_id', $id)->get();
         return view('dataresto.dataMenu', compact('menus', 'nama_resto'));
    }
    //---- END MENU ----//

    //---- PESANAN -----//
    public function manage_pesanan($id){
        //$psnn = Booking::findOrFail('resto_id', $id)->get();
//        $lihatpesanan = Booking::where('id',50)->first();
//        $lihat = $lihatpesanan;
//        echo $lihat;



        $pesanan = Booking::where('resto_id', $id)->with('user','restomenu')->get();

        return view('dataresto.dataPesanan', compact('pesanan'));
    }

    public function update_pesanan($id, Request $request){

        $pesanan = Booking::where('resto_id', $id)->first();
        $pesanan->update(Request::all());

        return redirect('manage/pesanan/'.$pesanan->resto_id);
    }

    //---- END PESANAN ----//




    //----  TEST ----//
    function test(){
        $user = User::with('restodata')->find(7);
        echo $user->restodata->resto_name;
    }
    function test1(){

        $resto = Restodata::with('restoimage')->find(31);
        echo $resto->restoimage;
    }
    function test2(){
        $resto = Restoimage::with('restodata')->get();
        echo $resto;
    }
    function test3(){
        $resto = Restoimage::get();
        echo $resto;
    }
    function test4(){
        $resto = User::with('restodata')->find(7);
        echo $resto->restoimage;
    }
    function test5(){
        $resto = Restodata::with('restoimage')->with('restomenu')->get();
        return response()->json([
            'list_resto' => $resto
        ]);


    }
    function test6(){
        $resto = Restodata::with('restomenu')->get();
        return response()->json($resto);

    }
    //menampilkan menu menurut id
    function test7(){
        $resto = Restomenu::with('restodata')->where('resto_id', 31)->get();
        return response()->json($resto);
    }

    public function test8(){
        //App\Country::with('cities')->get();
        //App\Country::with('cities')->where('name', 'Indonesia')-
        $pesanan = Booking::where('resto_id',31);
        $pe = $pesanan->with('bookingdetail')->with('restomenu');
        //$pesanan = Booking::with('user')->with('bookingdetail')->with('restomenu')->where('id_menu')->get();
        //$pesann = $pesanan;
       // $bapak = Bookingdetail::where('id_booking',51)->with('restomenu')->get();
        // echo $pesann;
        //return response()->json($pesann)
        return response()->json($pe);
    }




    //---- END TEST ----//
}
