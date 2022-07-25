<?php

namespace App\Http\Controllers\v1;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\v1\Producto;

class ProductosController extends Controller
{
    function getAll () 
    {
        $response = new \stdClass();
        
        $productos = Producto::all();

        $response->success = true;
        $response->data = $productos;

        return response()->json($response, 200);

    }

    function getItem($id)
    {
        $response = new \stdClass();
         
        $producto = Producto::find($id);

        $response->success = true;
        $response->data = $producto;

        return response()->json($response, 200);
    }

    function storeProduct(Request $request)
    {
        $response = new \stdClass();
        
        $producto = new Producto();

        $producto->nombre_producto = $request->nombre_producto;
        $producto->modelo = $request->modelo;
        $producto->categoria = $request->categoria;
        $producto->color = $request->color;
        $producto->precio = $request->precio;
        $producto->save();

        $response->success = true;
        $response->data = $producto;
        
        return response()->json($response, 200);

    }

    function putUpdate (Request $request)
    {
        $response = new \stdClass();

        $producto = Producto::find($request->id);

        if($producto){

            $producto->nombre_producto = $request->nombre_producto;
            $producto->modelo = $request->modelo;
            $producto->categoria = $request->categoria;
            $producto->color = $request->color;
            $producto->precio = $request->precio;
            $producto->save();

            $response->success = true;
            $response->data = $producto;

        }
        else{

        }

        return response()->json($response,($response->success ? 200 : 400));
    }

    function pacthUpdate (Request $request)
    {
        $response = new \stdClass();

        $producto = Producto::find($request->id);

        if($producto)
        {
            if($request->nombre_producto)
                $producto->nombre_producto = $request->nombre_producto;

            if($request->modelo)
                $producto->modelo = $request->modelo;

            if($request->categoria)
                $producto->categoria = $request->categoria;

            if($request->color)
                $producto->color = $request->color;


            if($request->precio)
                $producto->precio = $request->precio;
            
            $producto->save();
            $response->success = true;
            $response->data = $producto;

        }
        else{
            $response->success = false;
            $response->erros = ["el producto con el".$request->id."no existe"];
        }

        return response()->json($response,($response->success ? 200 : 400));
    }

    function delete($id)
    {
        $response = new \stdClass();

        $producto = Producto::find($id);

        if($producto)
        {
            $producto->delete();
            $response->succes = true;
        }
        else{
            $response->success = false;
            $response->erros = ["El producto con el".$id."no existe"];
        }

        return response()->json($response,($response->success ? 200 : 400));
    }
}