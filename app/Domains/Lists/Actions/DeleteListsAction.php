<?php

namespace App\Domains\Lists\Actions;

use App\Models\Lists;

class DeleteListsAction
{
    public function execute(int $id)
    {
        $lists = Lists::find($id);
        if ($lists != null) {
            $lists -> delete();
        }
    }
}
