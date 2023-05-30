<?php

namespace App\Domains\Lists\Actions;

use App\Models\Lists;

class PatchListsAction
{
    public function execute(int $id, array $fields)
    {
        $list= Lists::findOrFail($id);
        $list -> update($fields);
        return $list;
    }
}
