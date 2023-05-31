<?php

namespace App\Console\Commands;

use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;

class CreateElasticsearchIndexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elastic:create-index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create index';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'desks',
            'body' => [
                'settings' => [
                    'number_of_shards' => 1,
                ],
                'mappings' => [
                    'properties' => [
                        'id' => [
                            'type' => 'integer'
                        ],
                        'name' => [
                            'type' => 'text'
                        ]
                    ]
                ]
            ]
        ];

        $response = $client->indices()->create($params);
        echo $response->getBody();
    }
}
