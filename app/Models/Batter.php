<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batter extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'type'];

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
