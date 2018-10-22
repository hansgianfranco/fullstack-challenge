<?php

namespace App\Exceptions;

use App\Serializers\ResponseSerializer;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    use ResponseSerializer;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->expectsJson() || $request->ajax()) {
            switch (get_class($exception)) {
                case ValidationException::class:
                    if ($request->ajax()) {
                        $response = $this->responseError('validation_error', $exception->validator->errors(), $exception, false);
                    } else {
                        $response = $this->responseError('validation_error', $exception->validator->errors(), $exception, false, 422);
                    }
                    break;
                case AuthenticationException::class:
                    $response = $this->responseError(trans('auth.unauthenticated'), ['redirect' => route('login')], $exception);
                    break;
                case RequestException::class:
                    $response = $this->responseError($exception->getMessage(), null, $exception, true);
                    break;
                default:
                    $response = $this->responseError($exception->getMessage(), null, $exception);
                    break;
            }
        } else {
            if ($exception instanceof TokenMismatchException) {
                $response = redirect()->route('login')
                    ->withErrors(['token' => trans('auth.token')]);
            } else {
                $response = parent::render($request, $exception);
            }
        }
        return $response;
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Auth\AuthenticationException $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return $this->responseError(trans('auth.unauthenticated'), null, null, null, 401);
        }
        return redirect()->guest(route('login'));
    }
}
