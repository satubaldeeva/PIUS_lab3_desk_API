<?php

namespace App\Http\ApiV1\Modules\Lists\Controllers;

use App\Domains\Lists\Actions\DeleteListsAction;
use App\Domains\Lists\Actions\PatchListsAction;
use App\Domains\Lists\Actions\PostListsAction;
use App\Domains\Lists\Actions\PutListsAction;
use App\Http\ApiV1\Modules\Lists\Requests\PatchListRequest;
use App\Http\ApiV1\Modules\Lists\Resources\ListsResource;
use App\Http\Controllers\Controller;
use App\Http\ApiV1\Modules\Lists\Requests\CreateListRequest;
use App\Domains\Lists\Models\Lists;

class ListController extends Controller
{
    public function index()
    {
        return ListsResource::collection(Lists::all());
    }

    public function get(int $id)
    {
        return new ListsResource(Lists::findOrFail($id));
    }
    public function post(
        CreateListRequest $request,
        PostListsAction $action
    ) {
        return new ListsResource($action->execute($request->validated()));
    }

    public function put(
        CreateListRequest $request,
        PutListsAction $action,
        int $id
    ) {
        return new ListsResource($action->execute($id, $request->validated()));
    }

    public function patch(
        PatchListRequest $request,
        PatchListsAction $action,
        int $id
    ) {
        return new ListsResource($action->execute($id, $request->validated()));
    }

    public function delete(
        DeleteListsAction $action,
        int $id
    ) {
        $action->execute($id);
        return response()->noContent();
    }
}
