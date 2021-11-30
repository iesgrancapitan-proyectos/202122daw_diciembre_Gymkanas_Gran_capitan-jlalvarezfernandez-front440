<?php
/**
 * modelo Test
 * 
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_gymkana',
        'name',
        'description',
        'image',
        'max_period',
        'difficulty',
        'acceptance_criteria',
        'score',
        'review',
        
    ];
}
