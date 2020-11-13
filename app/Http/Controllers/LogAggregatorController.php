<?php

namespace App\Http\Controllers;

use App\Models\LogAggregator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

/**
 * Class LogAggregatorController
 *
 * @package App\Http\Controllers
 */
class LogAggregatorController extends Controller
{
    use Searchable;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $logs = LogAggregator::orderBy('id', 'DESC')->paginate(self::PER_PAGE);

        return view('logs/list', ['logs' => $logs]);
    }
}
