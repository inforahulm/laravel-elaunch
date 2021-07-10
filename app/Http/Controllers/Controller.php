<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}



// use Facade\FlareClient\Http\Response;
// use Illuminate\Auth\Access\AuthorizationException;
// use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
// use Illuminate\Auth\AuthenticationException;

//         if($exception instanceof AccessDeniedHttpException || $exception instanceof AuthorizationException){
//             return response()->json([
//                 'success' => false,
//                 'errors' => new \StdClass(),
//                 'message' => $exception->getMessage(),
//             ], 403);
//         }

