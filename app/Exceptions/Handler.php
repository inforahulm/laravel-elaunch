<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;



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
    
   /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

        /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */

    public function render($request, Throwable $exception)
    {
        dd($exception);
        if($request->expectsJson()){
          if($exception instanceof ModelNotFoundException){

            return response()->json([
                'error'=>'modal not found'
            ],400);
        }
        if($exception instanceof NotFoundHttpException){

            return response()->json([
                'error'=>'incorrect route'
            ],404);
        }

        if($exception instanceof MethodNotAllowedHttpException){

            return response()->json([
                'error'=>' method not supported for this route'
            ],405);
        }


        if($exception instanceof ValidationException){
            foreach ($exception->errors() as $field => $message) {
                      $data[$field] = $message[0];
                     }

            return response()->json([
                'message'=>$data,
                'error'=>'The given data was invalid'
            ],404);
        }

    }
    return parent::render($request, $exception);
    
    }

}
