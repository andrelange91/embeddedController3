<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helpers\DataHelper;
use Psr\Container\ContainerInterface;

class TempApiController
{
    private $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function GetHighestTemperature(Request $request, Response $response)
    {
        $dataHelper = $this->container->get(DataHelper::class);
        $data = $dataHelper->GetHighest();
        if (!empty($data)) {
            $firstRow = $data[array_keys($data)[0]];

            $response->getBody()->write($firstRow['Temperature']);

            return $response;
        }else{
            $response->getBody()->write("no data found");
            return $response;
        }
    }


    public function GetLowestTemperature(Request $request, Response $response)
    {
        $dataHelper = $this->container->get(DataHelper::class);
        $data = $dataHelper->GetLowest();
        if (!empty($data)) {
            $firstRow = $data[array_keys($data)[0]];

            $response->getBody()->write($firstRow['Temperature']);

            return $response;
        }else{
            $response->getBody()->write("no data found");
            return $response;
        }
    }

    public function InsertTemperature(Request $request, Response $response, $args){
        // $registerTime = $args['RegisterTime'];
        // $temperature = $args['Temperature'];
        // $location = $args['Location'];
        $data = json_decode($request->getBody());

        var_dump($data->Temperature);
        var_dump($data->RegisterTime);
        var_dump($data->Location);
        var_dump($request->getQuery());
        var_dump($request->getScheme());
        var_dump($request->getParsedBody());

        die();

        $dataHelper = $this->container->get(DataHelper::class);
        $data = $dataHelper->InsertTemp($registerTime, $temperature, $location);

        $response->getBody()->write("row added to collection");
        return $response;
    }
}