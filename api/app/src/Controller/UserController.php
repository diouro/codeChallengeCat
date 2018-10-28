<?php

namespace Controller;

use Firebase\JWT\JWT;
use Tuupola\Base62;
use Carbon\Carbon;
use Model\User;
use Psr\Container\ContainerInterface;

final class UserController
{

    protected $container;
   
    public function list($request, $response)
    {
        return $response->withJson(User::get()->toArray());
    }

    public function __construct(ContainerInterface $container = null) 
    {
        $this->container = $container;
    }

    public function token($request,$response,$args)
    {
        
        $expires = Carbon::now()->addDays(30)->timestamp;
        $payload = [
            'sub' => $request->getServerParams()['PHP_AUTH_USER'],
            'jti' => (new Base62)->encode(random_bytes(16)),
            'iat' => Carbon::now()->timestamp,
            'exp' => $expires
        ];

        try
        {

            $token = JWT::encode($payload, $this->container->get('config')['secreat'], 'HS256');
            if($token)
            {
                return $response->withJson([
                    'status' => true,
                    'message' => 'Token generated successful',
                    'token' => $token,
                    'expires' => $expires
                ]);
            }

        }
        catch(Exception $ex)
        {
            // Catch this and send it out to a cloud storage
        }

        return $response->withJson(['status' => false, 'message' => 'Error occur, Token generated failed']);

    }

}
