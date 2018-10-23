<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Valitron\Validator;

final class Role extends Model
{

    /**
     * Table name
     */
    protected $table = 'roles';

    public static $type = [
        'player'    => 1,
        'coach'     => 2
    ];

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

}
