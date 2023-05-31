<?php

namespace App\Console\Commands;

use App\Domains\Desk\Actions\DeskModelToElasticAction;
use App\Domains\Desk\Actions\IndexDeskAction;
use App\Domains\Desk\Models\Desk;
use Illuminate\Console\Command;

class SeedElasticIndexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elastic:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed index';

    /**
     * Execute the console command.
     */
    public function handle(IndexDeskAction $action)
    {
        foreach (Desk::all() as $desk)
        {
            $action->execute($desk);
        }
    }
}
