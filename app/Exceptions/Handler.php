<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        if($request->expectsJson()) {

            if($exception instanceof NotFoundHttpException || $exception instanceof ModelNotFoundException)
            {
                return new JsonResponse(null, 404);
            }

            if($exception instanceof AuthorizationException)
            {
                return new JsonResponse([
                    'errors' => [
                        'root' => 'Access denied.'
                    ]
                ], 403);
            }
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'errors' => [
                    'root' => 'Unauthenticated'
                ]
            ], 401);
        }

        return redirect()->guest(route('login'));
    }
}
