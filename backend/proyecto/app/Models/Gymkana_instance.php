<?php
/**
 * modelo Gymkana-instance
 * 
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gymkana_instance extends Model
{
    protected $table = 'gymkana_instance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_gymkana',
        'start_date',
        'finish_date',
        'observations',
        'description',
    ];
}
