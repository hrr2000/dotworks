<?php

namespace App\Models\User;

use App\Models\Service\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = [
        'client_id',
        'provider_id',
        'process_type',
        'service_id',
        'amount',
        'total',
        'state',
        'method',
        'token'
    ];


    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class,'client_id');
    }
    public function provider(): BelongsTo
    {
        return $this->belongsTo(User::class,'provider_id');
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class,'service_id');
    }

}
