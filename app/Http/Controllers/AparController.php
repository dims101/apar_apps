<?php

namespace App\Http\Controllers;

use App\Apar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AparController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apar = Apar::all();
        $today = Carbon::now();
        $expired = Apar::where('warn_date','<',$today)
                    ->get();
        // return $warning;
        return view('apar.index',compact('apar','today','expired'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warn_date = new Carbon($request->exp_date);
        $warn_date = $warn_date->subMonths(3)->format('Y-m-d');
        
        $request->request->add(['warn_date' => $warn_date]);
        // return $request;
        Apar::create($request->all());

        return redirect('/inventori')->with('message','Berhasil menambahkan data APAR!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apar  $apar
     * @return \Illuminate\Http\Response
     */
    public function show(Apar $apar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apar  $apar
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id_apar = Apar::where('qr_apar',$request->qr_apar)->first();
        $warn_date = new Carbon($request->exp_date);
        $warn_date = $warn_date->subMonths(3)->format('Y-m-d');
        // return $id_apar->id;die;
        $apar = Apar::where('id',$id_apar->id)
                        ->update([
                            'qr_apar' => $request->qr_apar,
                            'merk' => $request->merk,
                            'jenis' => $request->jenis,
                            'lokasi' => $request->lokasi,
                            'warn_date' => $warn_date,
                            'exp_date' => $request->exp_date,
                        ]);
        return redirect('/inventori')->with('message','Berhasil mengedit data APAR!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apar  $apar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apar $apar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apar  $apar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Apar::destroy($request->id);

        return redirect('/inventori')->with('message','Berhasil menghapus APAR!');
    }

    public function cekid(Request $request)
    {
        $apar = Apar::where('qr_apar',$request->qr_apar)
                    ->first();
        
        if(is_null($apar)){
            return response()->json([
                "status" => 1,
                "message" => 'Identitas dapat digunakan'
            ],200);
        } else {
            return response()->json([
                "status" => 0,
                "message" => 'Identitas sudah digunakan'
            ],200);
        }
        
    }
}
