<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User_groups extends Model
{
    protected $table = 'user_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_group',
    ];
}
