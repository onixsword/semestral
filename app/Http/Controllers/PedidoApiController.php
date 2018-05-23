<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PedidoApiController extends Controller
{
    //Altas
    public function createPedido(Request $request){
        $token = $request->input('token');

        $tokenData = \App\User::where('token','=',$token)->first();
        if(!(is_null($tokenData))){
            $usuario = \App\User::where('id','=',$token->idUser)->first();

            $nuevoPedido = new \App\Pedido;
            $nuevoPedido->idUsuario = $usuario->id;
            $nuevoPedido->idEstadoPedido = 1;
            $nuevoPedido->total = $request->input("total");
    
            if ($nuevoPedido->save()) {
                $cantidades = $request->input("cantidades");
                $nombres = $request->input("nombres");
                $precios = $request->input("precios");
                $subtotales = $request->input("subtotales");
                $ids = $request->input("ids");
                $indice = 0;
                foreach($cantidades as $cantidad) {
                    $nuevoElementoPedido = new \App\ElementoPedido;
                    $nuevoElementoPedido->idPedido =
                        $nuevoPedido->id;
                    $nuevoElementoPedido->idComida =
                        $ids[$indice];
                    $nuevoElementoPedido->nombreComida =
                        $nombres[$indice];
                    $nuevoElementoPedido->precioComida =
                        $precios[$indice];
                    $nuevoElementoPedido->cantidad = 
                        $cantidades[$indice];
                    $nuevoElementoPedido->subtotal =
                        $subtotales[$indice];
                        
                    $nuevoElementoPedido->save();
                    $indice++;
                }
            }

            $respuesta = array();
            $error['exito'] = true;        
            $error['mensaje'] = "Pedido realizado";
            return $respuesta;
        }

        $respuesta = array();
        $error['exito'] = false;        
        $error['mensaje'] = "Usuario y password no coinciden";

        return $respuesta;
    }

    //Consultas
    public function getPedidosUsuario($idUsuario) {
        $pedidos =
            \App\Pedido::where('idUsuario','=',$idUsuario)
                ->get();
        return $pedidos;
    }

    public function getListaComponentes(){
        $componentes = \App\Componente::all();
        return $componentes;
    }

    public function getComponenteDetallado($idComponente){
        $componente = \App\Componente::where('id', '=', $idComponente)->first();
        $marca = \App\Marca::where('id','=',$componente->idMarca)->first();
        $respuesta = array();
        $respuesta['componente'] = $componente;
        $respuesta['marca'] = $marca;
        return $respuesta;
    }

    public function getMarca($idMarca){
        $marca = \App\Marca::where('id','=',$idMarca)->get();
        return $marca;
    }
}