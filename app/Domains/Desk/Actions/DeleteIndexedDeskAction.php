<?php

namespace App\Domains\Desk\Actions;

use App\Domains\Desk\Models\Desk;
use Elastic\Elasticsearch\ClientBuilder;

class DeleteIndexedDeskAction
{
    public function execute(Desk $desk)
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'desks',
            'id' => $desk->id,
        ];

        $client->delete($params);
    }
}
