<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apar;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function scan()
    {
        return view('scan.index');
    }

    public function validasi(Request $request)
    {
        $apar = Apar::where('qr_apar',$request->qr_code)->first();
        if($apar != null){
            return response()->json([
                "status" => 1,
                "id"     => $apar->id,
                "message" => "APAR ditemukan!"
            ],200);
        } else {
            return response()->json([
                "status" => 0,
                "message"     => "APAR tidak ditemukan!"
            ],200);
        }
        
    }
}
