<?php

namespace  App\Http\Utils;

use Illuminate\Contracts\Validation\Validator;

class JsonHttpResponse
{
    public static function successResponse($data, String $status, Int $code = 200)
    {
        return response()->json(
            [
                'data' => $data,
                'status' => $status
            ],
            $code
        );
    }

    public static function errorResponse(string $message, String $status, Int $code = 500)
    {
        return response()->json(
            [
                'message' => $message,
                'status' => $status
            ],
            $code
        );
    }
}
