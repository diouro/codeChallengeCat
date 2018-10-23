<?php

namespace Controller;

use Model\User;

final class UserController
{
   
    public function list($request, $response)
    {

        return $response->withJson(User::get()->toArray());

    }

}
