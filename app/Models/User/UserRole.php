<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public function users(){
        return $this->hasMany(User::class,'user_role_id','id');
    }
    public function permissions(){
        return $this->belongsToMany(UserPermission::class, 'user_role_permissions', 'user_role_id', 'user_permission_id');
    }
}
