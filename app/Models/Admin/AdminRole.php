<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{

    public function admins(){
        return $this->hasMany(Admin::class,'admin_role_id','id');
    }
    public function permissions(){
        return $this->belongsToMany(AdminPermission::class, 'admin_role_permissions', 'admin_role_id', 'admin_permission_id');
    }

}
