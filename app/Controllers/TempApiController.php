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
            var_dump($firstRow);
            die();
            $response->getBody()->write($firstRow);

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
            var_dump($firstRow);
            die();
            $response->getBody()->write($firstRow);

            return $response;
        }else{
            $response->getBody()->write("no data found");
            return $response;
        }
    }
}