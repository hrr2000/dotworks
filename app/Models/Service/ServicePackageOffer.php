<?php

namespace App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class ServicePackageOffer extends Model
{

    protected $table = 'service_package_offers';

    protected $fillable = [
        'name',
        'is_main',
        'service_package_id',
    ];

    public function package(){
        return $this->belongsTo(Service::class,'service_id');
    }

}
