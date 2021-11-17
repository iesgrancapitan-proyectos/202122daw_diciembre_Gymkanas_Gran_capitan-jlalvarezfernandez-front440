<?php

/**
 * modelo Participants
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $table = 'participants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_group',
        'id_gymkana_instance',
    ];
}
