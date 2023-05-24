<?php

namespace App\Domains\Lists\Actions;

use App\Models\Lists;

class PutListsAction
{
    public function execute(int $id, array $fields)
    {
        $lists = Lists::findOrFail($id);
        $lists -> update($fields);
        return $lists;
    }
}
