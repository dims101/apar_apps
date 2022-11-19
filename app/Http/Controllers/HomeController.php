<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apar;
use App\Form;
use Carbon\Carbon;

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
        $now = Carbon::now();
        $month = $now->month;
        $total = Apar::all()->count();
        $sudah = Form::whereMonth('created_at',$month)
                        ->get()->count();
        $belum = $total - $sudah;
        $warning = Apar::where('warn_date','<',$now)
                            ->where('exp_date','>',$now)
                            ->get()->count();
        $expired = Apar::where('exp_date','<',$now)
                        ->get()->count();
        $data = compact('total','sudah','belum','warning','expired');
        return view('home',compact('data'));
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
