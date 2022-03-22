<?php

namespace App\Http\Controllers;

use App\Models\Gama;
use App\Http\Resources\GamaResource;
use App\Http\Requests\GamaRequest;
use Illuminate\Http\Request;

class GamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GamaResource::collection(Gama::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GamaRequest $request)
    {
        return (new GamaResource(Gama::create($request->all())))
        ->additional(['message' => 'Registro Exitoso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gama $gama)
    {
        return new GamaResource($gama);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Gama $gama)
    {
        $data = $request->all();
        $gama->fill($data);

        if($gama->isClean())
        {
            return response()->json([
                'response' => false,
                'message' => 'Debe especificar al menos un valor diferente para actualizar'
            ],409);

        }

        $dataChange = $gama->getDirty();
        $gama->save();

        return (new GamaResource($gama))
        ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gama $gama)
    {
        $gama->delete();
        return (new GamaResource($gama))
        ->additional(['message' => 'Eliminacion exitosa.']);
    }
}
