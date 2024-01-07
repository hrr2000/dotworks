<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    public function roles(){
        return $this->belongsToMany(AdminRole::class, 'admin_role_permissions', 'admin_permission_id', 'admin_role_id');
    }
}
