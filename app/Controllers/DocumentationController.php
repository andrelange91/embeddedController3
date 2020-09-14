<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DocumentationController
{
    public function DocumentationPage(Request $request, Response $response)
    {
        $response->getBody()->write("Hello DocumentationPage");
        return $response;
    }
}
