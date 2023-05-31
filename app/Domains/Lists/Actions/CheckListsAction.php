<?php

namespace App\Domains\Lists\Actions;

use App\Domains\Desk\Models\Desk;
use App\Domains\Lists\Models\Lists;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CheckListsAction
{
    public function execute(Lists $list): void
    {
        if ($list->isClean('desk_id')) {
            return;
        }

        if (Desk::find($list->desk_id) == null) {
            throw new BadRequestHttpException();
        }
    }
}
