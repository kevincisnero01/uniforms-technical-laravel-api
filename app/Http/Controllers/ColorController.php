<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Resources\ColorResource;
use App\Http\Requests\ColorRequest;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       return ColorResource::collection(Color::paginate(10));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(ColorRequest $request)
   {
       return (new ColorResource(Color::create($request->all())))
       ->additional(['message' => 'Registro Exitoso']);
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show(Color $color)
   {
       return new ColorResource($color);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,Color $color)
   {
       $data = $request->all();
       $color->fill($data);

       if($color->isClean())
       {
           return response()->json([
               'response' => false,
               'message' => 'Debe especificar al menos un valor diferente para actualizar'
           ],409);

       }

       $dataChange = $color->getDirty();
       $color->save();

       return (new ColorResource($color))
       ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Color $color)
   {
       $color->delete();
       return (new ColorResource($color))
       ->additional(['message' => 'Eliminacion exitosa.']);
   }
}
