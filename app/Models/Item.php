<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name',
        'description',
        'category',
        'condition',
        'user_id',
        'owner_name',
        'image',
        'is_available',
        'reward_coins',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'reward_coins' => 'integer',
    ];
}
