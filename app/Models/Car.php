<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand', 'price', 'reference', 'model', 'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'owner_id');
    }
}
