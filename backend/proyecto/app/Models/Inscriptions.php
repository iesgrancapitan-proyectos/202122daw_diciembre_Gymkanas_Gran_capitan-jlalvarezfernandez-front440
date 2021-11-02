<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Inscriptions extends Model
{
    protected $table = 'inscriptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_gymkana_instance',
        'id_participant',
        'date',
        'observations',
        'checkup',
    ];
}
