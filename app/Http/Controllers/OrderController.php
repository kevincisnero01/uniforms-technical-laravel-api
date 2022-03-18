<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Http\Resources\OrderResource;
use App\Http\Requests\OrderRequest;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderResource::collection(Order::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        //INSERT PEDIDO  
        $order = Order::create([
            'id_user' => $request->id,
            'total_pedido' => $request->total_pedido,
            'id_pedidos_status' => 1, //PEDIDO NUEVO
            'id_pedido_mayor' => $request->id_pedido_mayor
        ]);

        //UPDATE SHOPPING_CART  	
        $cart = Cart::where([
        	['id_user', '=', $request->id],
        	['id_pedidos', '=', 0]
        ])->update(['id_pedidos' => 1]);


        return (new OrderResource($order))
        ->additional(['message' => 'Registro Exitoso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order)
    {
        $data = $request->all();
        $order->fill($data);

        if($order->isClean())
        {
            return response()->json([
                'response' => false,
                'message' => 'Debe especificar al menos un valor diferente para actualizar'
            ],409);

        }

        $dataChange = $order->getDirty();
        $order->save();

        return (new OrderResource($order))
        ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return (new OrderResource($order))
        ->additional(['message' => 'Eliminacion exitosa.']);
    }
}

