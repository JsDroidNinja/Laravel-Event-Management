<?php

namespace App\Traits;

trait ApiResponseTrait
{
    /**
     * Return success response.
     */
    public function successResponse($message, $data = [], $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Return error response.
     */
    public function errorResponse($message, $errors = [], $statusCode = 422)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $statusCode);
    }
}
