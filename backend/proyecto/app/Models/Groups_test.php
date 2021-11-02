<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Groups_test extends Model
{
    protected $table = 'groups_test';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_group',
        'id_test',
        'start_date',
        'finish_date',
        'checkup',
        'score',
        'answer'
    ];
}
