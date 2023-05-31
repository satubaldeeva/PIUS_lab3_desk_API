<?php

namespace App\Domains\Desk\Actions;

class BuildDesksSearchElasticBodyAction
{
    public function execute(array $request)
    {
        $parameters = [
            'size' => 10,
            'from' => 0,
        ];

        if(isset($request['filter'])) {
            foreach($request['filter'] as $key => $value){
                $parameters['query']['bool']['must']['match'][$key] = $value;
            }
        }

        if(isset($request['sort'])) {
            foreach($request['sort'] as $key => $value){
                $parameters['sort'][$key] = $value;
            }
        }

        if(isset($request['pagination'])){
            $parameters['size'] = $request['pagination']['limit'];
            $parameters['from'] = $request['pagination']['offset'];
        }


        return $parameters;
    }
}
