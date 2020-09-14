<?php
// use for each controller.
use App\Controllers\DocumentationController;
use App\Controllers\HomeController;

// define all routes for application
$app->get('/', HomeController::class . ':FrontPage')->setName("frontPage");
$app->get('/api/documentation', DocumentationController::class . ':DocumentationPage')->setName("documentation");
