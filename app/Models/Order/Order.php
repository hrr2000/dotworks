<?php

namespace App\Models\Order;

use App\Models\Service\Service;
use App\Models\Service\ServicePackage;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{

    protected $fillable = [
        'client_id',
        'provider_id',
        'package_id',
        'state_id',
        'price',
        'amount',
        'seen',
        'client_given_rate',
        'provider_given_rate',
        'client_given_feedback',
        'provider_given_feedback',
        'start_delivery',
        'files_uploaded',
        'accepted_at',
        'completed_at',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(ServicePackage::class,'package_id');
    }
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class,'client_id');
    }
    public function provider(): BelongsTo
    {
        return $this->belongsTo(User::class,'provider_id');
    }
    public function state(): BelongsTo
    {
        return $this->belongsTo(OrderState::class,'state_id');
    }
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
    public function files(){
        return $this->hasMany(OrderFile::class);
    }

}
