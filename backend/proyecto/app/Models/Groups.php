<?php
/**
 * modelo Groups
 * 
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
    ];
}
