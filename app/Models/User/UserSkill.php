<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'level'
    ];

    function user(){
        $this->belongsTo('App\User','user_id');
    }
}
