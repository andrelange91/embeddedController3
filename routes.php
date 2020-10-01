<?php
// use for each controller.
use App\Controllers\DocumentationController;
use App\Controllers\HomeController;
use App\Controllers\TempApiController;

// define all routes for application
$app->get('/', HomeController::class . ':FrontPage')->setName("frontPage");
$app->get('/api/documentation', DocumentationController::class . ':DocumentationPage')->setName("documentation");

// API Routes
$app->get('/api/gethighesttemperature', TempApiController::class . ':GetHighestTemperature');
$app->get('/api/getlowesttemperature', TempApiController::class . ':GetLowestTemperature');
$app->post('/api/insertTemp', TempApiController::class . ':InsertTemperature');
