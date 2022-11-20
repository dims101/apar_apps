<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $alluser = User::all();
        return view('auth.index',compact('user','alluser'));
    }

    public function makeadmin(User $user){
        
        User::where('id',$user->id)
                ->update([
                    'level'=>'Admin'
                ]);
        return redirect('/akun')->with('admin', $user->nama.' telah menjadi Admin');
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
        try{
            $password = Hash::make($request->password);
            User::create([
                'nama' => $request->nama,
                'penneng' => $request->penneng,
                'group' => $request->group,
                'dept' => $request->dept,
                'level' => 'user',
                'password' => $password
            ]);
            $response =[
                'success' => 1,
                'message' => 'Berhasil mendaftar!'
            ];
            return response()->json($response);
        } catch (\Exception $e){
            return response()->json($e,201);
        }
        // $response = [
        //     'data'=>[
        //         'nama'=> $request->nama,
        //     ],
        //     'code'=>'200',
        //     'status'=>'OK'
        // ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        User::where('id',$user->id)
                ->update([
                    'nama'=>$request->nama,
                    'penneng'=>$request->penneng,
                    'dept'=>$request->dept,
                    'group'=>$request->group,
                ]);
        if($request->password != null){
            $password = Hash::make($request->password);
            User::where('id',$user->id)
                ->update([
                    'password'=>$password
                ]);
        }
        return redirect('/akun')->with('message','Berhasil mengubah akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
