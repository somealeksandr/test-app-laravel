<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return ResourceCollection
     */
    public function index(): ResourceCollection
    {
        return StatusResource::collection(Status::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  StoreStatusRequest $request
     * @return JsonResponse
     */
    public function store(StoreStatusRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $status = Status::create($validated);

        return response()->json(new StatusResource($status), 201);
    }

    /**
     * Display the specified resource.
     * @param  Status $status
     * @return StatusResource
     */
    public function show(Status $status): StatusResource
    {
        return new StatusResource($status);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  UpdateStatusRequest $request
     * @param  Status $status
     * @return StatusResource
     */
    public function update(UpdateStatusRequest $request, Status $status): StatusResource
    {
        $validated = $request->validated();
        $status->update($validated);

        return new StatusResource($status);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Status $status
     * @return JsonResponse
     */
    public function destroy(Status $status): JsonResponse
    {
        $status->delete();
        return response()->json(null, 204);
    }
}
