<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRequest;
use App\Http\Resources\RequestResource;
use App\Models\Request;
use App\Models\RequestHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RequestController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return RequestResource::collection(Request::all());
    }

    public function store(RequestRequest $request): RequestResource
    {
        $newRecord = Request::create($request->validated());

        RequestHistory::create(
            [
                'user_id' => auth()->id(),
                'request_id' => $newRecord->id,
                'action_id' => 1,
                'note' => 'Request created',
            ]
        );

        return new RequestResource($request);
    }

    public function show(Request $request): RequestResource
    {
        return new RequestResource($request);
    }

    public function update(RequestRequest $req, Request $request): RequestResource
    {
        $request->update($req->validated());

        RequestHistory::create(
            [
                'user_id' => auth()->id(),
                'request_id' => $request->id,
                'action_id' => 2,
                'note' => 'Request assigned to',
            ]
        );

        return new RequestResource($request);
    }

    public function destroy(Request $request): JsonResponse
    {
        $request->delete();

        return response()->json(['message' => 'Request deleted'], 200);
    }

    public function changeStatus(Request $request, int $status): RequestResource
    {
        $request->status_id = $status;
        $request->save();

        RequestHistory::create(
            [
                'user_id' => auth()->id(),
                'request_id' => $request->id,
                'action_id' => 3,
                'note' => 'Request completed',
            ]
        );

        return new RequestResource($request);
    }
}
