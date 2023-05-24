<?php

namespace App\Domains\Lists\Actions;

use App\Models\Lists;

class PatchListsction
{
    public function execute(int $id, array $fields)
    {
        $list= Lists::findOrFail($id);
        $list -> update($fields);
        return $list;
    }
}
