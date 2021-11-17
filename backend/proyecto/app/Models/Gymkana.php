<?php
/**
 * modelo Gymkanat
 * 
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gymkana extends Model
{
    protected $table = 'gymkanas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'type',
        'period',
    ];
}
