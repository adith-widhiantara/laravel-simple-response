<?php

namespace Adithwidhiantara\LaravelResponseFormatter;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseFormatter
{
    public static function success(
        $data = [],
        $message = 'Success',
        $status = 'success',
        $code = Response::HTTP_OK
    ): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function error(
        $data = [],
        $message = 'Failed',
        $status = 'failed',
        $code = Response::HTTP_BAD_REQUEST
    ): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}