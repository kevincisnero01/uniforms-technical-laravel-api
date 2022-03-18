<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Resources\BrandResource;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BrandResource::collection(Brand::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        return (new BrandResource(Brand::create($request->all())))
        ->additional(['message' => 'Registro Exitoso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Brand $brand)
    {
        $data = $request->all();
        $brand->fill($data);

        if($brand->isClean())
        {
            return response()->json([
                'response' => false,
                'message' => 'Debe especificar al menos un valor diferente para actualizar'
            ],409);

        }

        $dataChange = $brand->getDirty();
        $brand->save();

        return (new BrandResource($brand))
        ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return (new BrandResource($brand))
        ->additional(['message' => 'Eliminacion exitosa.']);
    }
}
