<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Resources\SizeResource;
use App\Http\Requests\SizeRequest;
use Illuminate\Http\Request;

class SizeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SizeResource::collection(Size::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeRequest $request)
    {
        return (new SizeResource(Size::create($request->all())))
        ->additional(['message' => 'Registro Exitoso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        return new SizeResource( $size);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Size $size)
    {
        $data = $request->all();
         $size->fill($data);

        if( $size->isClean())
        {
            return response()->json([
                'response' => false,
                'message' => 'Debe especificar al menos un valor diferente para actualizar'
            ],409);

        }

        $dataChange =  $size->getDirty();
         $size->save();

        return (new SizeResource( $size))
        ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
         $size->delete();
        return (new SizeResource( $size))
        ->additional(['message' => 'Eliminacion exitosa.']);
    }
}
