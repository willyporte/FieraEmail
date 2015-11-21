<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParametriRequest;

class AdminParametriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // formulario admin
        $parametri = \DB::table('parametri')->select('id','omaggi_ogni','gadget_ogni','time')->first();
        return view('admin.parametri',compact('parametri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParametriRequest $request, $id)
    {
        // update
        $parametri = \DB::table('parametri')
            ->where('id',$request->id)
            ->update([
                'omaggi_ogni' => $request->omaggi_ogni,
                'gadget_ogni' => $request->gadget_ogni,
                'time'        => $request->time
                ]);
        if($parametri > 0) {
            //ok
            \Session::flash('message','Parametri Modificati corettamente');
            \Session::flash('alert-class','alert-info');
        }
        else {
            // KO
            \Session::flash('message','Nessun parametro modificato!');
            \Session::flash('alert-class','alert-danger');
        }
        return redirect()->back();
    }

}
