<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

/**
 * exception trait
 * @param return a response for the handler.php class
 */
trait ExceptionTrait
{
    public function apiException($request, $exception)
    {
                    // dd('yep') ;
        if($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => "Product Model not found",
            ], Response::HTTP_NOT_FOUND);
        }
        if($exception instanceof NotFoundHttpException ) {
            return response([
                'error' => "Route not found",
            ], Response::HTTP_NOT_FOUND);
        }
    }
}

