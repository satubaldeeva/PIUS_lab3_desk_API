<?php

namespace App\Domains\Desk\Actions;

use App\Domains\Desk\Models\Desk;
use Elastic\Elasticsearch\ClientBuilder;

class IndexDeskAction
{

    public function execute(Desk $desk): void
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'desks',
            'id' => $desk->id,
            'body' => [
                'id' => $desk->id,
                'name' => $desk->name,
            ]
        ];

        $client->index($params);
    }
}
