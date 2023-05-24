<?php

namespace App\Domains\Desk\Actions;

use App\Models\Desk;

class PostDeskAction
{
    public function execute(array $fields)
    {
        $desk = Desk::create($fields); 
    }
}
