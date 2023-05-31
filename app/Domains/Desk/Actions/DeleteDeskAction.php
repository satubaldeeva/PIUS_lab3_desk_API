<?php

namespace App\Domains\Desk\Actions;

use App\Domains\Desk\Models\Desk;

class DeleteDeskAction
{
    public function execute(int $id)
    {
        $desk = Desk::find($id);
        if ($desk != null) {
            $desk -> delete();
        }
    }
}
