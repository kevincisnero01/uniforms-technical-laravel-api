<?php

namespace App\Http\Controllers;

use App\Models\Iva;
use App\Http\Resources\IvaResource;
use App\Http\Requests\IvaRequest;
use Illuminate\Http\Request;

class IvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return IvaResource::collection(Iva::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IvaRequest $request)
    {
        return (new IvaResource(Iva::create($request->all())))
        ->additional(['message' => 'Registro Exitoso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Iva $iva)
    {
        return new IvaResource($iva);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Iva $iva)
    {
        $data = $request->all();
        $iva->fill($data);

        if($iva->isClean())
        {
            return response()->json([
                'response' => false,
                'message' => 'Debe especificar al menos un valor diferente para actualizar'
            ],409);

        }

        $dataChange = $iva->getDirty();
        $iva->save();

        return (new IvaResource($iva))
        ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iva $iva)
    {
        $iva->delete();
        return (new IvaResource($iva))
        ->additional(['message' => 'Eliminacion exitosa.']);
    }
}
