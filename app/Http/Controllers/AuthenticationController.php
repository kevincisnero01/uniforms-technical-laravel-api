<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
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


        return response()->json([
            'response' => true,
            'message' => 'Usuario registrado correctamente'
        ],200);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'message' => ['Las credenciales son incorrectas.'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'response' => true,
            'message' => 'Inicio de sesión correctamente',
            'token' => $token
        ],200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'response' => true,
            'message' => 'Cierre de sesión correctamente'
        ],200);
    }
}
