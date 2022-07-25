<?php

namespace App\Http\Controllers\v1;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\v1\Cliente;

class ClientesController extends Controller
{
    function getCliente()
    {
        $response = new \stdClass();
        $cliente = Cliente::all();

        $response->success = true;
        $response->data = $cliente;

        return response()->json($response, 200);
    }
    
    function getClienteById($id)
    {
        $response = new \stdClass();
        $cliente = Cliente::find($id);

        $response->success = true;
        $response->data = $cliente;

        return response()->json($response, 200);
    }

    function saveCliente(Request $request)
    {
        $response = new \stdClass();

        $cliente = new Cliente();

        $cliente->nombre = $request->nombre;
        $cliente->correo = $request->correo;
        $cliente->documento_identidad = $request->documento_identidad;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        $response->success = true;
        $response->data = $cliente;

        return response()->json($response, 200);
    }

    function putUpdateCliente(Request $request)
    {
        $response = new \stdClass();

        $cliente = Cliente::find($request->id);
        
        if($cliente)
        {
            $cliente->nombre = $request->nombre;
            $cliente->correo = $request->correo;
            $cliente->documento_identidad = $request->documento_identidad;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->save();

            $response->success = true;
            $response->data = $cliente;
            
        }
        else
        {
            $response->success=false;
            $response->erros=["el cliente con el id ".$request->id." no existe"];
        }
        return response()->json($response, 200);
    }

    function patchUpdateCliente(Request $request)
    {
        $response = new \stdClass();

        $cliente = Cliente::find($request->id);
        
        if($cliente)
        {
            if($request->nombre)
            $cliente->nombre = $request->nombre;
            
            if($request->correo)
            $cliente->correo = $request->correo;
            
            if($request->documento_identidad)
            $cliente->documento_identidad = $request->documento_identidad;
            
            if($request->direccion)
            $cliente->direccion = $request->direccion;
            
            if($request->telefono)
            $cliente->telefono = $request->telefono;
            
            $cliente->save();
            
            $response->success = true;
            $response->data = $cliente;
            
        }
        else
        {
            $response->success=false;
            $response->erros=["el cliente con el id ".$request->idCliente." no existe"];
        }
        return response()->json($response, 200);
    }

    function deleteCliente($id)
    {
        $response = new \stdClass();

        $cliente = Cliente::find($id);
        
        if($cliente)
        {
            $cliente->delete();
            $response->success = true;            
        }
        else
        {
            $response->success=false;
            $response->erros=["el cliente con el id ".$id." no existe"];
        }
        return response()->json($response,($response->success?200 : 400));
    }
}
