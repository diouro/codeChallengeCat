<?php

$app->group('/api/v1', function(){

    $this->post('/user/token', 'Controller\UserController:token');
    $this->get('/users', 'Controller\UserController:list');
    $this->get('/teams', 'Controller\TeamController:list');
    $this->get('/wellness/{player_id}/{coach_id}', 'Controller\WellnessController:getPlayerWellness');
    $this->post('/wellness', 'Controller\WellnessController:create');
    $this->put('/wellness/{user_id}', 'Controller\WellnessController:update');

    $this->get('/ping', function($request,$response){
        return $response->withJson(['message' => 'pong']);
    });
    
});

$app->get('/', function($request,$response,$args){
    return $this->renderer->render($response, 'endpoints.phtml', $args);
});

