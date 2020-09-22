<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TempApiController
{
    public function GetHighestTemperature(Request $request, Response $response)
    {
        $dataHelper = new DataHelper();
        $data = $dataHelper->GetHighest();

        // $data = "31c";
        $response->getBody()->write($data);
        return $response;
    }
    public function GetLowestTemperature(Request $request, Response $response)
    {
        $data = "-1c";
        $response->getBody()->write($data);
        return $response;
    }
    public function GetMedianTemperature(Request $request, Response $response)
    {
        $data = "21c";
        $response->getBody()->write($data);
        return $response;
    }
}