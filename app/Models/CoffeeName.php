<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeName extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function order(){
        return $this->hasMany(Order::class, 'name_id');
    }
}
