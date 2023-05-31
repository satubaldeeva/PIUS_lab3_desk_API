<?php

namespace App\Domains\Desk\Actions;

use App\Domains\Desk\Data\DeskElasticData;
use App\Domains\Desk\Models\Desk;
use Elastic\Elasticsearch\ClientBuilder;

class SearchDeskAction
{
    public function __construct(protected BuildDesksSearchElasticBodyAction $buildBody)
    {
    }
    public function execute(array $request): array
    {

        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'desks',
            'body' => $this->buildBody->execute($request),
        ];

        $response = $client->search($params);
        return array_map(fn(array $hit) => new DeskElasticData($hit['_source']), $response['hits']['hits']);
    }
}
