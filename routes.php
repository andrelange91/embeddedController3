<?php
// use for each controller.
use App\DocumentationController;
use App\HomeController;

// define all routes for application
$app->get('/', HomeController::class . ':FrontPage');
$app->get('/api/documentation', DocumentationController::class . ':DocumentationPage');
