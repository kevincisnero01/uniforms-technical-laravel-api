<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->NIF = $request->NIF;
        $user->placa = $request->placa;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->password = bcrypt($request->password);
        $user->telefono1 = $request->telefono1;
        $user->telefono2 = $request->telefono2;
        $user->id_gama = $request->id_gama;
        $user->save();

        return (new UserResource($user))
        ->additional(['message' => 'Registro Exitoso']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        $user->fill($data);

        if($user->isClean())
        {
            return response()->json([
                'response' => false,
                'message' => 'Debe especificar al menos un valor diferente para actualizar'
            ],409);

        }

        $dataChange = $user->getDirty();
        $user->save();

        return (new UserResource($user))
        ->additional(['message' => 'Actualizacion exitosa','datachange' => $dataChange ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return (new UserResource($user))
        ->additional(['message' => 'Eliminacion exitosa.']);
    }
    
    public function clients()
    {
        $users = User::where('activo','=',1)
        ->select(
            'users.id as id_user',
            'users.NIF as DNI',
            'users.placa',
            'users.apellido',
            'users.id_gama',
            'gamas.gama as catalogo',
            'users.puntos'
        )
        ->join('gamas','users.id_gama','=','gamas.id_gama')
        ->get();

        return UserResource::collection($users);
    }

}
