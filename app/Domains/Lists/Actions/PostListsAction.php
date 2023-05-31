<?php

namespace App\Domains\Lists\Actions;

use App\Domains\Lists\Models\Lists;

class PostListsAction
{
    public function __construct(protected CheckListsAction $checkListsAction)
    {
    }

    public function execute(array $fields)
    {
        $list = new Lists($fields);
        $this->checkListsAction->execute($list);
        $list->save();

        return $list;
    }
}
