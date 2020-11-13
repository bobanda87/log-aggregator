<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Trait JsonResponseTrait
 */
trait JsonResponseTrait
{
    /**
     * @param $error
     *
     * @param int $status
     * @return JsonResponse
     */
    protected function failedJsonResponse($error, $status = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json($error, $status);
    }

    /**
     * @param $data
     *
     * @return JsonResponse
     */
    protected function successJsonResponse($data): JsonResponse
    {
        return response()->json($data, Response::HTTP_OK);
    }

}
