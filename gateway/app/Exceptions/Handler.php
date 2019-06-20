<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
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
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof HttpException){
            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];
            $response =  $this->errorResponse($message, $code);
        }elseif($exception instanceof ModelNotFoundException){
            $model = mb_strtolower(class_basename($exception->getModel()));
            $response = $this->errorResponse("Don't exist any instance of {$model} with the given id", Response::HTTP_NOT_FOUND);
        }elseif ($exception instanceof AuthorizationException) {
            $response = $this->errorResponse($exception->getMessage(), Response::FORBIDDEN);
        }elseif ($exception instanceof AuthenticationException) {
            $response = $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }elseif ($exception instanceof ValidationException) {
            $errors = $exception->validator->errors()->getMessages();
            $response = $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }elseif ($exception instanceof \ErrorException && env('APP_DEBUG', false)) {
            $response = $this->errorResponse($exception->getMessage(), Response::HTTP_PRECONDITION_REQUIRED);
        }elseif ($exception instanceof ClientException) {
            $response = $this->errorMessage($exception->getResponse()->getBody(), $exception->getCode());
        }else{
            $response = $this->errorResponse('Unexpected error. Try later.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response;
        //return parent::render($request, $exception);
    }
}
