<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment as Twig;

class HomeController
{
    private $twig;
    public function __construct(Twig $twig){
        $this->twig = $twig;
    }

    public function FrontPage(Request $request, Response $response)
    {
        $html = $this->twig->render('FrontPage.twig');

        $response->getBody()->write($html);
        return $response;
    }
}