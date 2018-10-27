<?php

// All file paths relative to root
chdir(dirname(__DIR__));

require 'vendor/autoload.php';
session_start();

$settings = require 'app/settings.php';

// Instantiate Slim
$app = new \Slim\App($settings);

$app->add(new Tuupola\Middleware\JwtAuthentication([
    "secret"    => $settings['jwt']['secreat'],
    "path"      => ["/api"],
    "ignore"    => ["/api/v1/user/token", "/api/v1/ping"]
]));

require 'app/src/dependencies.php';
require 'app/src/middleware.php';

// Register the routes
require 'app/src/routes.php';

// Register the database connection with Eloquent
$capsule = $container->get('capsule');
$capsule->bootEloquent();

$app->run();
