<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delevery extends Model
{
    use HasFactory;
    protected $fillable = [
        'address_id',
        'products_id',
        'price',
        'time',
        'users_id',
        'value',
    ];
}
