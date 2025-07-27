<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * Return a standardized success JSON response
     * 
     * @param mixed $data The response data
     * @param string $message A success message
     * @param int $statusCode HTTP status code (default 200)
     * @return JsonResponse
     */
    protected function successResponse($data = null, string $message = '', int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status_code' => $statusCode,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Return a standardized error JSON response
     * 
     * @param string $message An error message
     * @param int $statusCode HTTP status code
     * @param mixed $errors Additional error details
     * @return JsonResponse
     */
    protected function errorResponse(string $message, int $statusCode, $errors = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'status_code' => $statusCode,
            'message' => $message,
            'errors' => $errors
        ], $statusCode);
    }

    /**
     * Return a rate limit exceeded response
     * 
     * @return JsonResponse
     */
    protected function tooManyRequestsResponse(): JsonResponse
    {
        return $this->errorResponse(
            'Too many requests. Please try again later.',
            429
        );
    }

    /**
     * Return a not found response
     * 
     * @param string $message
     * @return JsonResponse
     */
    protected function notFoundResponse(string $message = 'Resource not found'): JsonResponse
    {
        return $this->errorResponse($message, 404);
    }

    /**
     * Return a validation error response
     * 
     * @param mixed $errors Validation errors
     * @param string $message
     * @return JsonResponse
     */
    protected function validationErrorResponse($errors, string $message = 'Validation failed'): JsonResponse
    {
        return $this->errorResponse($message, 422, $errors);
    }
}