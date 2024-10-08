<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingPartner extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "shipping_partners";
    protected $fillable = [
        "partner_id",
        "name",
        "code",
        "address",
    ];
}
