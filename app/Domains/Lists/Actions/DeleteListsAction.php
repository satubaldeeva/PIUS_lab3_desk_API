<?php

namespace App\Domains\Lists\Actions;

use App\Domains\Lists\Models\Lists;

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
