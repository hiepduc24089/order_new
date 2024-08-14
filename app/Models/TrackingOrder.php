<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrackingOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tracking_orders";
    protected $fillable = [
        "package_id",
        "package_code",
        "status_transport",
        "weight",
        "warehouse_id",
        "customer_id",
        "order_id",
        "order_code",
        "order_create_time"
    ];
}
