<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class ServiceState extends Model
{

    public function services(){
        return $this->hasMany(Service::class, 'state_id');
    }

}
