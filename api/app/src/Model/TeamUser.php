<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Valitron\Validator;
use Model\Roles;

final class TeamUser extends Model
{

    /**
     * Table name
     */
    protected $table = 'team_users';

    /**
     * Turn off the created_at & updated_at columns
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fields that can be updated via update()
     * @var array
     */
    protected $fillable = ['team_id','user_id'];

    public static function isPlayersCoach($player_id,$coach_id)
    {   
    
        $playerTeams = self::where('user_id','=',$player_id)->get();
        foreach($playerTeams as $pt)
        {
            $coach = self::where('user_id','=',$coach_id)
            ->where('team_id','=',$pt->team_id)
            ->where('role_id','=',Roles::$type['coach'])
            ->first();

            if($coach)
            {
                return true;
            }

        }

        return false;

    }

    public function team()
    {
        return $this->hasOne('Model\Team','id','team_id');
    }
    
    public function player()
    {
        return $this->hasOne('Model\User','id','user_id');
    }
    
    public function role()
    {
        return $this->hasOne('Model\Role','id','role_id');
    }

}
