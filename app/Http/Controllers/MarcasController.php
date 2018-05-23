<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MarcasController extends Controller
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
            $marcas = \App\Marca::all();
            $argumentos = array();
            $exito = $request->input('exito');
            $borrado = $request->input('borrado');
            $argumentos["marcas"] = $marcas;
            $argumentos["exito"] = $exito;
            $argumentos["borrado"] = $borrado;
            return view("marcas.index", $argumentos);
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
        return view('marcas.create', $argumentos);
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
        $numerodetelefono = $request->input('numerodetelefono');

        $nuevaMarca = new \App\Marca;
        $nuevaMarca->nombre = $nombre;
        $nuevaMarca->numerodetelefono = $numerodetelefono;       

        $respuesta = array();
        $respuesta["exito"] = false;
        if ($nuevaMarca->save()) {
            $respuesta["exito"] = true;
        }

        return redirect()->route('marcas.index',$respuesta);

        
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
        $marcas = \App\Marca::find($id);
        $exito = $request->input('exito');
        
        $argumentos = array();
        $argumentos['marcas'] = $marcas;
        $argumentos['exito'] = $exito;

        return view('marcas.edit',$argumentos);

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
        $marcas = \App\Marca::find($id);
        $marcas->nombre = $request->input('txtNombre');
        $marcas->numerodetelefono = $request->input('numerodetelefono');

        $respuesta = array();
        $respuesta["exito"] = false;

        if ($marcas->save()) {
            $respuesta["exito"] = true;
        }
        $respuesta["marcas"] = $id;
        return redirect()->route('marcas.edit',$respuesta);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marcas = \App\Marca::find($id);
        $resultado = array();
        $resultado["borrado"] = false;
        if($marcas->delete()) {
            $resultado["borrado"] = true;
        }
        return redirect()->route('marcas.index',$resultado);
    }
}
