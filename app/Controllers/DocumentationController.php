<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment as Twig;

class DocumentationController
{
    private $twig;
    public function __construct(Twig $twig){
        $this->twig = $twig;
    }

    public function DocumentationPage(Request $request, Response $response)
    {
        $html = $this->twig->render('DocumentationPage.twig');

        $response->getBody()->write($html);
        return $response;
    }
}
