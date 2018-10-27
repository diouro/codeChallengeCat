<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Valitron\Validator;

final class Wellness extends Model
{
    
    /**
     * Table name
     */
    protected $table = 'wellness';
    
    /**
     * Turn off the created_at & updated_at columns
     * @var boolean
     */
    public $timestamps = false;
    
    /**
     * Fields that can be updated via update()
     * @var array
     */
    protected $fillable = ['user_id', 'sleep', 'soreness', 'fatigue'];

    /**
     * Save player wellness
     *
     * @param  Array $data Data to be validated
     */
    public static function create($data)
    {

        try
        {
            
            $wellness = new Wellness;
            $wellness->user_id = $data['user_id'];
            $wellness->sleep = $data['sleep'];
            $wellness->soreness = $data['soreness'];
            $wellness->fatigue = $data['fatigue'];
            $wellness->overall = round(($wellness->sleep + $wellness->soreness + $wellness->fatigue) / 3,2);
            $wellness->recorded_at = \Carbon\Carbon::now();
            
            return $wellness->save();

        }
        catch(Exception $ex)
        {
            return false;
        }

    }

    /**
     * Update player wellness
     *
     * @param  Array $data Data to be validated
     */
    public function updateWellness($wellness,$data)
    {
        
        try
        {
            $wellness = self::find($wellness['id']);
            $wellness->sleep = $data['sleep'];
            $wellness->soreness = $data['soreness'];
            $wellness->fatigue = $data['fatigue'];
            $wellness->overall = round(($wellness->sleep + $wellness->soreness + $wellness->fatigue) / 3,2);
            
            return $wellness->save();

        }
        catch(Exception $ex)
        {
            return false;
        }

    }

}
