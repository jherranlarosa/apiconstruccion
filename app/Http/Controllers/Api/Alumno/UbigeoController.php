<?php

namespace App\Http\Controllers\Api\Alumno;

use Illuminate\Http\Request;
use App\Model\Alumno\Ubigeo;
use App\Http\Controllers\Api\BaseController as BaseController;

class UbigeoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaUbigeo()
    {
        $ubigeo=Ubigeo::all();

        return $this->sendResponse($ubigeo, 'Loaded List Successfully :)'); 
    }

    
    public function getIdUbigeo(Request $request)
    {
        $distrito=Ubigeo::select('*')->where('departamento',$request->departamento)->where('provincia',$request->provincia)->where('distrito',$request->distrito)->first();
        return $this->sendResponse($distrito, 'Loaded List Successfully :)'); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
