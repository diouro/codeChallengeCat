<?php

$app->get('/', function(){
    echo "Please use the routes availables.";
});
$app->get('/users', 'Controller\UserController:list');
$app->get('/teams', 'Controller\TeamController:list');
$app->get('/wellness/{player_id}/{coach_id}', 'Controller\WellnessController:getPlayerWellness');
$app->post('/wellness', 'Controller\WellnessController:create');
$app->put('/wellness/{player_id}', 'Controller\WellnessController:update');
