<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    public function path() {
        return 'images/users_slider/';
    }
}
