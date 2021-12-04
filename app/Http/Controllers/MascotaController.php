<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $mascota = Mascota::all();
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
        $mascota= new Mascota();

        //en esta parte asignamos el valor que se enviara al modelo especies
        $mascota->id_especie=$request->get('id_especie');
        $mascota->id_raza=$request->get('id_raza');
        $mascota->id_propietario=$request->get('id_propietario');
        $mascota->nombre=$request->get('nombre');
        $mascota->edad=$request->get('edad');
        $mascota->peso=$request->get('peso');
        $mascota->genero=$request->get('genero');
        //se envia con este metodo
        $mascota->save();
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
        return $mascota = Mascota::find($id);
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
        $mascota=Mascota::find($id);

        //en esta parte asignamos el valor que se enviara al modelo especies
        $mascota->id_especie=$request->get('id_especie');
        $mascota->id_raza=$request->get('id_raza');
        $mascota->id_propietario=$request->get('id_propietario');
        $mascota->nombre=$request->get('nombre');
        $mascota->edad=$request->get('edad');
        $mascota->peso=$request->get('peso');
        $mascota->genero=$request->get('genero');
        //se envia con este metodo
        $mascota->update();

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
        $mascota=Mascota::find($id);
        $mascota->delete();
    }
}
