<?php

namespace App\Http\Controllers\Api;

use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::with(['userMovil', 'estadoPedido', 'detallePedidos.platillo'])->get();
        return response()->json($pedidos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fk_usuario' => 'required|exists:user_movil,id',
            'total' => 'required|numeric|min:0',
            'fk_estado_pedido' => 'required|exists:estados_pedido,id',
            'fk_metodo_pago' => 'required',
            'hora_recojo' => 'required|date_format:H:i:s',
            'hora_pedido' => 'required|date_format:H:i:s',
            'num_orden' => 'required|string|max:255|unique:pedidos',
            'detalle_pedidos' => 'required|array',
            'detalle_pedidos.*.fk_platillo' => 'required|exists:platillos,id',
            'detalle_pedidos.*.cantidad' => 'required|integer|min:1',
            'detalle_pedidos.*.precio' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        DB::beginTransaction();
        try {
            $pedido = Pedido::create([
                'fk_usuario' => $request->fk_usuario,
                'total' => $request->total,
                'fk_estado_pedido' => $request->fk_estado_pedido,
                'fk_metodo_pago' => $request->fk_metodo_pago,
                'hora_recojo' => $request->hora_recojo,
                'hora_pedido' => $request->hora_pedido,
                'num_orden' => $request->num_orden,
            ]);

            foreach ($request->detalle_pedidos as $detalle) {
                DetallePedido::create([
                    'fk_pedido' => $pedido->id,
                    'fk_platillo' => $detalle['fk_platillo'],
                    'cantidad' => $detalle['cantidad'],
                    'precio' => $detalle['precio'],
                ]);
            }

            DB::commit();
            return response()->json($pedido->load(['detallePedidos']), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error al crear el pedido', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showByUserMovil($fk_usuario)
    {
        $pedidos = Pedido::where('fk_usuario', $fk_usuario)
            ->with(['userMovil', 'estadoPedido', 'detallePedidos.platillo'])
            ->get();

        if ($pedidos->isEmpty()) {
            return response()->json(['message' => 'No se encontraron pedidos para este usuario.'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($pedidos);
    }
}
