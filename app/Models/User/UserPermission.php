<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{

    public function roles(){
        return $this->belongsToMany(UserRole::class, 'user_role_permissions', 'user_permission_id', 'user_role_id');
    }

}
