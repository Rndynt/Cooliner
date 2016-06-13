<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Dataresto;
use App\Restodata;
use App\Userdata;
use Laracasts\Flash\Flash;
use Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Requests\RestoRequest;

class PagesController extends Controller
{

    public function home()
    {
        return view('index');
    }

    public function about()
    {
        $test = 'Rendy';
        return view('pages.about')->with('test', $test);
    }

    public function contact()
    {
        $contactme = 'ALI';
        return view('pages.contact')->with('contactme', $contactme);
    }

    public function data_resto()

    {
        $datarestos = Restodata::latest('created_at', 'desc')->get();

        return view('dataresto.dataResto',[ 'datarestos' => $datarestos]);
    }

    public function data_user()
    {
        $datausers = Userdata::latest('created_at', 'desc')->get();
        //return response()->json($datausers);
        return view('datauser.dataUser',[ 'datausers' => $datausers]);
    }

    public function dashboard()
    {
//        Flash::message('Welcome Aboard!');
        return view ('pages.dashboard');
    }

    public function profil_resto()
    {
        return view('dataresto.profil');
    }



}
