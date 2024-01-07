<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderState extends Model
{

    public const PENDING = 1;
    public const PROGRESS = 2;
    public const COMPLETE = 3;
    public const CANCELED = 4;

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

}
