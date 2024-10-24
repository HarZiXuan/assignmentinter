<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'shape', 'color', 'timestamp'];

// Disable timestamps if you don't need them.
public $timestamps = false;

protected $attributes = [
    'timestamp' => null, // Set default value
];

protected static function booted()
{
    static::creating(function ($shape) {
        $shape->timestamp = now(); // Automatically set the timestamp
    });
}

}


