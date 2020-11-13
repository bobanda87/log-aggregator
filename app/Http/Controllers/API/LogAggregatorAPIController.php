<?php

namespace App\Http\Controllers\API;

use App\Models\LogAggregator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class LogAggregatorAPIController
 *
 * @package App\Http\Controllers
 */
class LogAggregatorAPIController extends APIController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        if (!$request->ajax()) {
            return $this->failedJsonResponse('Non-ajax calls not allowed', Response::HTTP_NOT_FOUND);
        }

        if (!$request->search) {
            return $this->successJsonResponse([]);
        }

        $logs = LogAggregator::search($request->search)->paginate(self::PER_PAGE);
        return $this->successJsonResponse($logs);
    }
}
