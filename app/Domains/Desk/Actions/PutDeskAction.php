<?php

namespace App\Domains\Desk\Actions;

use App\Domains\Desk\Models\Desk;

class PutDeskAction
{
    public function execute(int $id, array $fields)
    {
        $desk = Desk::findOrFail($id);
        $desk -> update($fields);
        return $desk;
    }
}
