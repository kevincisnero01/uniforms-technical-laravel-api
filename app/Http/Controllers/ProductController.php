<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //INSERT PRODUCT    
        $product = Product::create($request->all());

        //INSERT STOCK
        if($request->has('id_talla') && $request->has('stock_qty')){

            $stock = ProductStock::create([
            'id_product' => $product->id_product,
            'id_talla' => $request->id_talla,
            'qty' => $request->stock_qty
            ]);

        }

        //INSERT IMAGES
        if($request->has('images')){

            //Opcion#1
            $images = $request->images;
            foreach ($images as $image) {
                ProductImage::create([
                    'id_product' => $product->id_product,
                    'url' => $image
                ]);
            }

        }

        //UNIR PARA MOSTRAR EN MENSAJE
        $product = Arr::add($product,'stock', $stock);
        $product = Arr::add($product, 'images', $images);

        return (new ProductResource($product))
        ->additional(['message' => 'Registro exitosa']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $product->fill($data);

        if($product->isClean())
        {
            return response()->json([
                'response' => false,
                'message' => 'Debe especificar al menos un valor diferente para actualizar'
            ],409);

        }

        $dataChange = $product->getDirty();
        $product->save();

        return (new ProductResource($product))
        ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $user->delete();
        return (new ProductResource($user))
        ->additional(['message' => 'Eliminacion exitosa.']);
    }
}
