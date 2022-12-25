<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apar;
use App\Form;

class TamuController extends Controller
{
    public function index(APAR $apar)
    {  
        $form = Form::select(
            'forms.*',
            'apars.id_lokasi',
            'apars.qr_apar',
            'apars.memo',
            'apars.lokasi',
            'apars.warn_date',
            'apars.exp_date',
            'users.penneng',
            'users.nama')
        ->leftjoin('apars','forms.id_apar','=','apars.id')
        ->leftjoin('users','forms.id_user','=','users.id')
        ->where('apars.id',$apar->id)
        ->orderBy('created_at','DESC')
        ->first();
        return view('scan.tamu',compact('form','apar'));
    }
    public function validasiTamu(Request $request)
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
