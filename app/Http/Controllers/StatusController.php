<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class StatusController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return StatusResource::collection(Status::all());
    }

    public function store(StatusRequest $request): StatusResource
    {
        $status = Status::create($request->validated());

        return new StatusResource($status);
    }

    public function show(Status $status): StatusResource
    {
        return new StatusResource($status);
    }

    public function update(StatusRequest $request, Status $status): StatusResource
    {
        $status->update($request->validated());

        return new StatusResource($status);
    }

    public function destroy(Status $status): JsonResponse
    {
        $status->delete();

        return response()->json(['message'=>'Deleted successfully.'], 200);
    }
}
