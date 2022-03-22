<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Illuminate\Database\QueryException;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'message' => __('Los datos proporcionados no son validos.'),
            'errors' => $exception->errors(),
        ], $exception->status);
    }

    public function render($request, Throwable $exception)
    {
        if($exception instanceof ModelNotFoundException)
        {
            return response()->json([
                'response' => false,
                'message' => 'Modelo no encontrado'
            ],400);
        }

        if($exception instanceof RouteNotFoundException)
        {
            return response()->json([
                'response' => false,
                'message' => 'No tienes permiso para acceder a esta ruta'
            ],401);
        }

        if($exception instanceof MethodNotAllowedException)
        {
            return response()->json([
                'response' => false,
                'message' => 'Método HTTP incorrecto durante el enrutamiento de solicitudes'
            ],400);
        }

        if($exception instanceof HttpResponseException)
        {
            return response()->json([
                'response' => false,
                'message' => 'Consulta HTTP sin exito'
            ],400);
        }

        if($exception instanceof QueryException)
        {
            return response()->json([
                'response' => false,
                'message' => 'Error en la ejecución de sentencias SQL'
            ],400);
        }


        return Parent::render($request, $exception);
    }

}