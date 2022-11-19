<?php

namespace App\Http\Controllers;

use App\Form;
use App\Apar;
use Illuminate\Http\Request;

class FormController extends Controller
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
                        ->get();
        // return $form;die;
        return view('inspeksi.index',compact('form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apar $apar)
    {   
        $lokasi = $apar->lokasi;
        return view('form.create',compact('apar','lokasi'));
        // return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // return $request;die;
        Form::create($request->all());
        Apar::update([
            'lokasi' => $request->lokasi
        ]);
        return redirect('/inventori')->with('message',"Berhasil menambah data inspeksi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        // return $request;
        Form::where('id',$request->id)
                ->update([
                    'tuas'=>$request->tuas,
                    'segel_tuas'=>$request->segel_tuas,
                    'pin'=>$request->pin,
                    'selang'=>$request->selang,
                    'nozzle'=>$request->nozzle,
                    'pressure'=>$request->pressure,
                    'tabung'=>$request->tabung,
                    'barcode'=>$request->barcode,
                    'keterangan'=>$request->keterangan,
                ]);
                return redirect('/inspeksi')->with('message',"Berhasil mengubah data inspeksi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        Form::destroy($request->id);

        return redirect('/inspeksi')->with('message','Berhasil menghapus data inspeksi!');
    }
}
