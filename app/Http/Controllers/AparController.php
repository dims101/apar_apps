<?php

namespace App\Http\Controllers;

use App\Apar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AparController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apar = Apar::all();
        $today = Carbon::now();
        return view('apar.index',compact('apar','today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(Apar $apar)
    {
        //
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
    public function destroy(Apar $apar)
    {
        //
    }
}
