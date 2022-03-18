<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Resources\CartResource;
use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       return CartResource::collection(Cart::all());
   }
   
   public function show_user_cart($user_id)
   {
        $queryRaw = DB::raw("(precio*qty) as total_bruto,(precio_iva*qty) as total_neto");
        $cart = Cart::where('id_user', $user_id)->select('*', $queryRaw)->get();

        $subtotales = DB::table('shopping_cart')
            ->select(DB::raw("
                COUNT(id_cart_item) as count, 
                FORMAT(SUM(precio*qty),'En-Us') as subtotal_bruto, 
                FORMAT(SUM(precio_iva*qty),'En-Us') as subtotal_neto")
            )
            ->where('id_user', $user_id)
            ->get();
            
        return (new CartResource($cart))
            ->additional(['subtotales' => $subtotales]);
    }

    public function add(Request $request)
    {        
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $talla_id = $request->talla_id;
        $observaciones = $request->observaciones;
        $qty = $request->qty;

        $product = Product::select(
            'products.id_product',
            'products.nombre',
            'products.precio',
            'products.precio_iva',
            'stock_producto.id_talla',
            'tallas.talla',
            'stock_producto.qty'
        )
        ->join('stock_producto','products.id_product','=','stock_producto.id_product')
        ->join('tallas','stock_producto.id_talla','=','tallas.id_talla')
        ->where(['products.id_product' => $product_id, 'stock_producto.id_talla' => $talla_id])
        ->first();
        
        $user = User::select('id','name','apellido')->find($user_id);

        $cart = Cart::create([
            'id_user'=> $user->id,
            'id_product'=> $product->id_product,
            'talla'=> $product->talla,
            'nombre' => $product->nombre,
            'precio' => $product->precio,
            'precio_iva' => $product->precio_iva,
            'observaciones' => $observaciones,
            'qty' => $qty,
            'id_pedidos' => null
        ]);
        
        return (new CartResource($cart))
            ->additional(['message' => 'Producto Agregado']);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show(Cart $cart)
   {
       return new CartResource($cart);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,Cart $cart)
   {
        $cart->qty = $request->qty;
        $cart->save();

        return (new CartResource( $cart))
        ->additional(['message' => 'Actualizacion exitosa']);

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Cart $cart)
   {
    $cart->delete();
    return (new CartResource( $cart))
    ->additional(['message' => 'Eliminacion exitosa.']);
   }

   public function clear($user_id)
    {
        $carts = Cart::where('id_user', $user_id)->get();

        foreach ($carts as $cart) {
             $cart->delete();
         } 

        return (new CartResource( $cart))
        ->additional(['message' => 'Carrito Vaciado.']);
    }


}
