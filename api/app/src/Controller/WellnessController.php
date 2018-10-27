<?php

namespace Controller;

use Model\User;
use Model\TeamUser;
use Model\Wellness;

final class WellnessController
{
   
    public function getPlayerWellness($request,$response,$args)
    {
        
        if($args['coach_id'])
        {
            
            
            if($args['coach_id'] == $args['player_id'] || TeamUser::isPlayersCoach($args['player_id'],$args['coach_id']))
            {
                
                $wellness = Wellness::where('user_id','=',$args['player_id'])->first();

                return $response->withJson([
                    'status' => true,
                    'data' => $wellness->toArray()
                ]);
            }
            else
            {
                return $response->withJson(['status' => false, 'message' => 'You have no access for this player information']); 
            }
        }

        return $response->withJson(['status' => false, 'message' => 'No user id provided']); 

    }

    public function create($request, $response,$args)
    {
        
        $args = json_decode($request->getBody(),true);
        
        if(array_key_exists('user_id',$args))
        {
            $find = Wellness::where('user_id','=',$args['user_id'])->first();            
            if(!$find)
            {
                $result = Wellness::create($args);
                if($result)
                {
                    return $response->withJson(['status' => true, 'message' => 'Player wellness saved successful']);
                }
                
                return $response->withJson(['status' => false, 'message' => 'Erro occur, wellness save failed']);

            }
            else
            {
                return $response->withJson(['status' => false, 'message' => 'Erro occur, the player already has a wellness saved']);
            }

        }

        return $response->withJson(['status' => false, 'message' => 'No user id provided']); 
        
    }
   
    public function update($request, $response,$args)
    {
        
        if(array_key_exists('user_id',$args))
        {
            
            $find = Wellness::find($args['user_id']);
            if($find)
            {
                $args = json_decode($request->getBody(),true);
                $result = Wellness::updateWellness($find->toArray(),$args);
                if($result)
                {
                    return $response->withJson(['status' => true, 'message' => 'Player wellness updated successful']);
                }
                else
                {
                    return $response->withJson(['status' => false, 'message' => 'Erro occured, wellness update failed']);
                }
            }
            
            return $response->withJson(['status' => false, 'message' => 'Erro occured, no wellness found for given user']);
            
        }

        return $response->withJson(['status' => false, 'message' => 'No user id provided']); 
        
    }

}
