<?php

namespace App\Domains\Lists\Actions;

use App\Domains\Lists\Models\Lists;

class PutListsAction
{
    public function __construct(protected CheckListsAction $checkListsAction)
    {
    }

    public function execute(int $id, array $fields)
    {
        $list = Lists::findOrFail($id);
        $list -> fill($fields);
        $this->checkListsAction->execute($list);
        $list->save();

        return $list;
    }
}
