<?php

namespace App\Http\ApiV1\Modules\Desk\Controllers;

use App\Domains\Desk\Actions\DeleteDeskAction;
use App\Domains\Desk\Actions\PatchDeskAction;
use App\Domains\Desk\Actions\PostDeskAction;
use App\Domains\Desk\Actions\PutDeskAction;
use App\Http\ApiV1\Modules\Desk\Requests\ReplaceDeskRequest;
use App\Http\ApiV1\Modules\Desk\Resources\DeskResource;
use App\Http\Controllers\Controller;
use App\Http\ApiV1\Modules\Desk\Requests\CreateDeskRequest;
use App\Http\ApiV1\Modules\Desk\Requests\PatchDeskRequest;
use App\Domains\Desk\Models\Desk;

class DeskController extends Controller
{
    public function index()
    {
        return DeskResource::collection(Desk::all());
    }

    public function get(int $id)
    {
        return new DeskResource(Desk::findOrFail($id));
    }
    public function post(
        CreateDeskRequest $request,
        PostDeskAction $action
    ) {
        return new DeskResource($action->execute($request->validated()));
    }

    public function put(
        ReplaceDeskRequest $request,
        PutDeskAction $action,
        int $id
    ) {
        return new DeskResource($action->execute($id, $request->validated()));
    }

    public function patch(
        PatchDeskRequest $request,
        PatchDeskAction $action,
        int $id
    ) {
        return new DeskResource($action->execute($id, $request->validated()));
    }

    public function delete(
        DeleteDeskAction $action,
        int $id
    ) {
        $action->execute($id);
        return response()->noContent();
    }
}
