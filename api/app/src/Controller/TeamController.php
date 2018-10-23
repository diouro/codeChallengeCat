<?php

namespace Controller;

use Model\User;
use Model\TeamUser;

final class TeamController
{
   
    public function list($request, $response)
    {
        
        return $response->withJson(TeamUser::with(['team','player','role'])->get()->toArray());

    }

}
