<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'type', 'name', 'ppu'];

    public function batters()
    {
        return $this->belongsToMany(Batter::class, 'product_batter', 'product_id', 'batter_id');
    }

    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'product_topping', 'product_id', 'topping_id');
    }
}
