<?php

namespace App\Http\ApiV1\Modules\Controllers;

use App\Domains\Lists\Actions\DeleteListsAction;
use App\Domains\Lists\Actions\PatchListsAction;
use App\Domains\Lists\Actions\PostListsAction;
use App\Domains\Lists\Actions\PutListsAction;
use App\Http\ApiV1\Modules\Lists\Resources\ListsResource;
use App\Http\Controllers\Controller;
use App\Http\ApiV1\Modules\Lists\Requests\CreateListsRequest;
use App\Http\ApiV1\Modules\Lists\Requests\PatchListsRequest;
use App\Models\Lists;

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
        CreateListsRequest $request,
        PostListsAction $action
    ) {
        return new ListsResource($action->execute($request->validated()));
    }

    public function put(
        CreateListsRequest $request,
        PutListsAction $action,
        int $id
    ) {
        return new ListsResource($action->execute($id, $request->validated()));
    }

    public function patch(
        PatchListsRequest $request,
        PatchListsAction $action,
        int $id
    ) {
        return new ListsResource($action->execute($id, $request->validated()));
    }    
}
