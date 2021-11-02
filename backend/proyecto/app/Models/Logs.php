<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'date',
        'description',
    ];
}
