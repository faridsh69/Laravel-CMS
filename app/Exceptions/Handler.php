<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
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
        return parent::render($request, $exception);
    }
}



// /**
//      * A list of the exception types that are not reported.
//      *
//      * @var array
//      */
//     protected $dontReport = [
//         \Illuminate\Auth\AuthenticationException::class,
//         \Illuminate\Auth\Access\AuthorizationException::class,
//         \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class,
//         \Symfony\Component\HttpKernel\Exception\HttpException::class,
//         \Illuminate\Database\Eloquent\ModelNotFoundException::class,
//         \Illuminate\Validation\ValidationException::class,
//     ];

//     /**
//      * A list of the inputs that are never flashed for validation exceptions.
//      *
//      * @var array
//      */
//     protected $dontFlash = [
//         'password',
//         'password_confirmation',
//     ];

//     /**
//      * Report or log an exception.
//      *
//      * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
//      *
//      * @param  \Exception  $exception
//      * @return void
//      */
//     public function report(Exception $exception)
//     {
//         if( class_exists('Log') ){
//             \Log::error( 
//                 $exception->getMessage() . ' on line ' . 
//                 $exception->getLine() . ' of file ' . 
//                 $exception->getFile()
//             );
//         }else{
//             parent::report($exception);
//         }
//     }

//     /**
//      * Render an exception into an HTTP response.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Exception  $exception
//      * @return \Illuminate\Http\Response
//      */
//     public function render($request, Exception $exception)
//     {
//         $errors = [
//             '301' => 'moved perminantly',
//             '401' => 'bad request',
//             '403' => 'authorization faild',
//             '404' => 'Not Found',
//             '405' => 'Method Not Allowed',
//             '429' => 'Too Many Requests',
//             '499' => 'token',
//             '500' => 'Internal Server Error',
//             '503' => 'php artisan down',
//         ];

//         if ($request->wantsJson()) {
//             $response = [
//                 'status' => 'error',
//                 'message' => $exception->getMessage(),
//                 'exception' => get_class($exception),
//                 'status_code' => $exception->getStatusCode(),
//             ];

//             return response()->json($response, $response['status_code']);
//         }
        
//         if ($exception instanceof AuthorizationException) {
//             return response()->view('vendor.error.403');
//         }
//         if ($exception instanceof NotFoundHttpException ) {
//             return response()->view('vendor.error.404');
//         }
//         if ($exception instanceof MethodNotAllowedHttpException) {
//             return response()->view('vendor.error.405' , ['exception' => $exception]);
//         }
//         if ($exception instanceof TokenMismatchException) {
//             return response()->view('vendor.error.499');
//         }
//         if ($exception instanceof ServiceUnavailableHttpException) {
//             return response()->view('vendor.error.503');
//         }
//         // if ($exception instanceof HttpException) {
//         //     return response()->view('vendor.error.429');
//         // }
//         if ($exception instanceof \InvalidArgumentException) {
//             return response()->view('vendor.error.view', ['exception' => $exception]);
//         }
//         if ($exception instanceof QueryException) {
//             return response()->view('vendor.error.query', ['exception' => $exception]);
//         }
//         if ($exception instanceof \ErrorException) {
//             return response()->view('vendor.error.500', ['exception' => $exception]);
//         }
//         if ($exception instanceof ModelNotFoundException) {
//             return response()->view('vendor.error.500', ['exception' => $exception]);
//         }

//         return parent::render($request, $exception);
//     }
