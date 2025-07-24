<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        apiPrefix: 'api/v1', // Set the global API prefix to 'api/v1'
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Add global middleware here if needed
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->is('api/*')) {
                $statusCode = 500;
                $response = [
                    'message' => 'Server Error',
                ];

                // Handle specific exceptions
                if ($e instanceof \Illuminate\Validation\ValidationException) {
                    $response['message'] = 'The given data was invalid.';
                    $response['errors'] = $e->validator->errors();
                    $statusCode = 422;
                } elseif (
                    $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ||
                    $e instanceof NotFoundHttpException
                ) {
                    $response['message'] = 'Resource not found.';
                    $statusCode = 404;
                } elseif ($e instanceof \Illuminate\Auth\AuthenticationException) {
                    $response['message'] = 'Unauthenticated.';
                    $statusCode = 401;
                } elseif ($e instanceof \Illuminate\Auth\Access\AuthorizationException) {
                    $response['message'] = 'This action is unauthorized.';
                    $statusCode = 403;
                }

                return response()->json($response, $statusCode);
            }

            // Let Laravel handle non-API exceptions
            return null;
        });
    })
    ->create();
