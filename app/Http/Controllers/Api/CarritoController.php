<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\Platillo;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'fk_usuario' => 'required|exists:user_movil,id',
        ]);
        // fk_usuario is taken directly from the request as per requirements.
        $carritoItems = Carrito::where('fk_usuario', $request->fk_usuario)->with('platillo')->get();
        return response()->json($carritoItems);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fk_usuario' => 'required|exists:user_movil,id',
            'fk_platillo' => 'required|exists:platillos,id',
            'cantidad' => 'required|integer|min:1',
        ]);
        // fk_usuario is taken directly from the request as per requirements.
        $carritoItem = Carrito::where('fk_usuario', $request->fk_usuario)
                                ->where('fk_platillo', $request->fk_platillo)
                                ->first();

        if ($carritoItem) {
            $carritoItem->cantidad += $request->cantidad;
            $carritoItem->save();
        } else {
            Carrito::create([
                'fk_usuario' => $request->fk_usuario,
                'fk_platillo' => $request->fk_platillo,
                'cantidad' => $request->cantidad,
            ]);
        }

        return response()->json(['message' => 'Platillo agregado al carrito correctamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'fk_usuario' => 'required|exists:user_movil,id',
            'fk_platillo' => 'required|exists:platillos,id',
        ]);

        $deleted = Carrito::where('fk_usuario', $request->fk_usuario)
                            ->where('fk_platillo', $request->fk_platillo)
                            ->delete();

        if ($deleted) {
            return response()->json(['message' => 'Platillo eliminado del carrito correctamente'], 200);
        } else {
            return response()->json(['message' => 'Platillo no encontrado en el carrito del usuario'], 404);
        }
    }

    public function clearCart(Request $request)
    {
        $request->validate([
            'fk_usuario' => 'required|exists:user_movil,id',
        ]);

        $deleted = Carrito::where('fk_usuario', $request->fk_usuario)->delete();

        if ($deleted) {
            return response()->json(['message' => 'Todos los platillos del carrito han sido eliminados correctamente'], 200);
        } else {
            return response()->json(['message' => 'No se encontraron platillos en el carrito del usuario para eliminar'], 404);
        }
    }
}
