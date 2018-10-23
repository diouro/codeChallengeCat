<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Valitron\Validator;

final class User extends Model
{

    /**
     * Table name
     */
    protected $table = 'users';

    /**
     * Turn off the created_at & updated_at columns
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fields that can be updated via update()
     * @var array
     */
    protected $fillable = ['first_name', 'last_name'];

}
