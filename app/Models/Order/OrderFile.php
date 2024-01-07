<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class OrderFile extends Model
{

    private static $path = 'images/orders';

    public static function path() {
        return self::$path;
    }
    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id');
    }

}
