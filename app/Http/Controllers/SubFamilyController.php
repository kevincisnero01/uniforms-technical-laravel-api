<?php

namespace App\Http\Controllers;

use App\Models\SubFamily;
use App\Http\Resources\SubFamilyResource;
use App\Http\Requests\SubFamilyRequest;
use Illuminate\Http\Request;

class SubFamilyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubFamilyResource::collection(SubFamily::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubFamilyRequest $request)
    {
        return (new SubFamilyResource(SubFamily::create($request->all())))
        ->additional(['message' => 'Registro Exitoso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubFamily $subfamily)
    {
        return new SubFamilyResource($subfamily);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SubFamily $subfamily)
    {
        $data = $request->all();
        $subfamily->fill($data);

        if($subfamily->isClean())
        {
            return response()->json([
                'response' => false,
                'message' => 'Debe especificar al menos un valor diferente para actualizar'
            ],409);

        }

        $dataChange = $subfamily->getDirty();
        $subfamily->save();

        return (new SubFamilyResource($subfamily))
        ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubFamily $subfamily)
    {
        $subfamily->delete();
        return (new SubFamilyResource($subfamily))
        ->additional(['message' => 'Eliminación exitosa.']);
    }
}
