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
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $this->allowOnlyAjax($request);

        $logs = LogAggregator::orderBy('id', 'DESC')->paginate(self::PER_PAGE);
        return $this->successJsonResponse($logs);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $this->allowOnlyAjax($request);

        if (!$request->search) {
            $logs = LogAggregator::orderBy('id', 'DESC')->paginate(self::PER_PAGE);
            return $this->successJsonResponse($logs);
        }

        $logs = LogAggregator::search($request->search)->paginate(self::PER_PAGE);
        return $this->successJsonResponse($logs);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $validator = \Validator::make($request->all(), LogAggregator::VALIDATION_FIELDS);

        if ($validator->fails()) {
            return $this->failedJsonResponse($validator->errors());
        }

        $log = LogAggregator::create([
            'log' => $request->log
        ]);

        return $this->successJsonResponse($log);

    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    protected function allowOnlyAjax(Request $request)
    {
        if (!$request->ajax()) {
            return $this->failedJsonResponse('Non-ajax calls not allowed', Response::HTTP_NOT_FOUND);
        }
    }
}
