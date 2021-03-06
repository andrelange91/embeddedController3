<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment as Twig;
use Slim\Routing\RouteContext as RouteContext;

class DocumentationController
{
    private $twig;
    public function __construct(Twig $twig){
        $this->twig = $twig;
    }

    public function DocumentationPage(Request $request, Response $response)
    {
        $route = RouteContext::fromRequest($request)->getRoute();

        $html = $this->twig->render('DocumentationPage.twig', ["routeName" => $route->getName()]);

        $response->getBody()->write($html);
        return $response;
    }
}
