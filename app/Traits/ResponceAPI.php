<?php

namespace App\Traits;

trait ResponceAPI
{
 
  public function success($message, $data, $statusCode = 200)
    {
          return response()->json([
                'message' => $message,
                'error' => false,
                'code' => $statusCode,
                'results' => $data
            ], $statusCode);
    }

      public function error($message, $statusCode = 500)
    {
          return response()->json([
                'message' => $message,
                'error' => true,
                'code' => $statusCode,
            ], $statusCode);
    }

   
}