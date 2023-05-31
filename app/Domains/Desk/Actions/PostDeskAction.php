<?php

namespace App\Domains\Desk\Actions;

use App\Domains\Desk\Models\Desk;

class PostDeskAction
{
    public function execute(array $fields): Desk
    {
        return Desk::create($fields);
    }
}
