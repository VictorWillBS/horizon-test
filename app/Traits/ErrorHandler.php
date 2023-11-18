<?php
namespace App\Traits;

use Throwable;

trait ErrorHandler
{

    protected function getErrorResponse(Throwable $exception){
        $statusCode = $this->getStatusCode($exception);
        return response()->json([
            'error' => [
                'code' => $statusCode,
                'message' => $this->getMessage($exception, $statusCode),
            ],
        ], $statusCode);
    }

    protected function getStatusCode(Throwable $exception)
    {
        return  $exception->statusCode ?? 500;
    }
    protected function getMessage(Throwable $exception, int $statusCode)
    {
        if(env('APP_ENV')=="production" && $statusCode==500 ){
            return "Internal Server Error";
        }
        return  $exception->getMessage();
    }

    protected function jsonResponse(array $payload=null, $statusCode=404)
    {
        $payload = $payload ?: [];

        return response()->json($payload, $statusCode);
    }

}
