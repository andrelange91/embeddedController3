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

    // public function InsertTemperature(Request $request, Response $response, Args $args){
    //     $dataHelper = $this->container->get(DataHelper::class);
    //     $data = $dataHelper->InsertTemp();
    // }
}