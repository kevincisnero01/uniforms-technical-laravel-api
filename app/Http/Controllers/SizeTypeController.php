<?php

namespace App\Http\Controllers;

use App\Models\SizeType;
use App\Http\Resources\SizeTypeResource;
use App\Http\Requests\SizeTypeRequest;
use Illuminate\Http\Request;

class SizeTypeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       return SizeTypeResource::collection(SizeType::all());
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(SizeTypeRequest $request)
   {
       return (new SizeTypeResource(SizeType::create($request->all())))
       ->additional(['message' => 'Registro Exitoso']);
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show(SizeType $size_type)
   {
       return new SizeTypeResource( $size_type);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,SizeType $size_type)
   {
       $data = $request->all();
        $size_type->fill($data);

       if( $size_type->isClean())
       {
           return response()->json([
               'response' => false,
               'message' => 'Debe especificar al menos un valor diferente para actualizar'
           ],409);

       }

       $dataChange =  $size_type->getDirty();
        $size_type->save();

       return (new SizeTypeResource( $size_type))
       ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(SizeType $size_type)
   {
       $size_type->delete();
       return (new SizeTypeResource( $size_type))
       ->additional(['message' => 'Eliminacion exitosa.']);
   }
}

