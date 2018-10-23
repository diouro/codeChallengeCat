<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Valitron\Validator;

final class Team extends Model
{

    /**
     * Table name
     */
    protected $table = 'teams';

    /**
     * Turn off the created_at & updated_at columns
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fields that can be updated via update()
     * @var array
     */
    protected $fillable = ['name'];

    // public function team()
    // {
    //     return $this->hasOne('Model\Team','id','team_id');
    // }

    // public function players()
    // {
    //     return $this->hasMany('Model\User')->where('role','=',1);
    // }
    
    // public function coachs()
    // {
    //     return $this->hasMany('Model\User')->where('role','=',2);
    // }
    
}
