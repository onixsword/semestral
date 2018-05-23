<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ComponentesController extends Controller
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
    public function index(Request $request)
    {
        $usuario = $request->user();
        if($usuario->idTipoUsuario == 1) {
            $componentes = \App\Componente::all();
            $argumentos = array();
            $exito = $request->input('exito');
            $borrado = $request->input('borrado');
            $argumentos["componentes"] = $componentes;
            $argumentos["exito"] = $exito;
            $argumentos["borrado"] = $borrado;
            return view("componentes.index", $argumentos);
        } else {
            return redirect()->route('index');
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $argumentos = array();
        return view('componentes.create', $argumentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->input('txtNombre');
        $descripcion = $request->input('txtDescripcion');
        $imagen = $request->input('imagen');
        $precio = $request->input('txtPrecio');
        $idMarca = $request->input('idMarca');

        $nuevoComponente = new \App\Componente;
        $nuevoComponente->nombre = $nombre;
        $nuevoComponente->imagen = $imagen;
        $nuevoComponente->descripcion = $descripcion;
        $nuevoComponente->precio = $precio;
        $nuevoComponente->idMarca = $idMarca;        

        $respuesta = array();
        $respuesta["exito"] = false;
        if ($nuevoComponente->save()) {
            $respuesta["exito"] = true;
        }

        return redirect()->route('componentes.index',$respuesta);

        
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
    public function edit(Request $request, $id)
    {
        $componentes = \App\Componente::find($id);
        $exito = $request->input('exito');
        
        $argumentos = array();
        $argumentos['componentes'] = $componentes;
        $argumentos['exito'] = $exito;

        return view('componentes.edit',$argumentos);

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
        $componentes = \App\Componente::find($id);
        $componentes->nombre = $request->input('txtNombre');
        $componentes->imagen = $request->input('imagen');
        $componentes->descripcion = $request->input('txtDescripcion');
        $componentes->precio = $request->input('txtPrecio');
        $componentes->idMarca = $request->input('txtIdMarca');

        $respuesta = array();
        $respuesta["exito"] = false;

        if ($componentes->save()) {
            $respuesta["exito"] = true;
        }
        $respuesta["componentes"] = $id;
        return redirect()->route('componentes.edit',$respuesta);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $componentes = \App\Componente::find($id);
        $resultado = array();
        $resultado["borrado"] = false;
        if($componentes->delete()) {
            $resultado["borrado"] = true;
        }
        return redirect()->route('componentes.index',$resultado);
    }
}
