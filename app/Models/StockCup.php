<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'total_cup',
        'price',
        'total_price',
        'date',

    ];
}
