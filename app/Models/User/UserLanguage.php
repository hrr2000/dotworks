<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'level'
    ];

    protected $table = 'user_languages';

    public function user(){
        $this->belongsTo('App\User','user_id');
    }
}
