<?php

/**
 * modelo Resources
 * 
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $table = 'resources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_test',
        'resource',
    ];
}
