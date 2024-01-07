<?php

namespace App\Models\Service;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    protected $table = 'service_packages';

    protected $fillable = [
        'title',
        'state',
        'type',
        'description',
        'reviews',
        'service_id'
    ];

    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }

    public function offers(){
        return $this->hasMany(ServicePackageOffer::class);
    }

    public function orders(){
        return $this->hasMany(Order::class, 'package_id');
    }

}
