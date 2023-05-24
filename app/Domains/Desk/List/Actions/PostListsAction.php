<?php

namespace App\Domains\Lists\Actions;

use App\Models\Lists;

class PostListsAction
{
    public function execute(array $fields)
    {
        $lists = Lists::create($fields); 
    }
}
