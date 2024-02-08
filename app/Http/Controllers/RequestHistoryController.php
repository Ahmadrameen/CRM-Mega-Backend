<?php

namespace App\Http\Controllers;

use App\Http\Resources\RequestHistoryResource;
use App\Models\RequestHistory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RequestHistoryController extends Controller
{
    public function index(int $request): AnonymousResourceCollection
    {
        return RequestHistoryResource::collection(RequestHistory::with('action', 'user')
            ->where('request_id', $request)
            ->orderBy('id', 'desc')
            ->get());
    }
}
