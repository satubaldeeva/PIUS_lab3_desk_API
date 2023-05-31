<?php

namespace App\Domains\Desk\Observers;

use App\Domains\Desk\Actions\DeleteIndexedDeskAction;
use App\Domains\Desk\Actions\IndexDeskAction;
use App\Domains\Desk\Models\Desk;

class DeskObserver
{
    public function __construct(protected IndexDeskAction $indexDeskAction, protected DeleteIndexedDeskAction $deleteIndexedDeskAction)
    {
    }

    public function created(Desk $desk): void
    {
        $this->indexDeskAction->execute($desk);
    }

    public function updated(Desk $desk): void
    {
        $this->indexDeskAction->execute($desk);
    }

    public function deleted(Desk $desk): void
    {
        $this->deleteIndexedDeskAction->execute($desk);
    }
}
