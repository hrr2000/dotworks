<?php

namespace App\Models;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class,'sender_id');
    }
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class,'receiver_id');
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
