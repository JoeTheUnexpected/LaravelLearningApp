<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
        $this->renderable(function (UnauthorizedHttpException $e) {
            return response()->json([
                'success' => false,
                'errors' => 'Ошибка авторизации'
            ]);
        });

        $this->renderable(function (ValidationException $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors()
                ]);
            }
        });

        $this->renderable(function (NotFoundHttpException $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->getMessage()
                ]);
            }
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
