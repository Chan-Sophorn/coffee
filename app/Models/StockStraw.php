<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockStraw extends Model
{
     protected $fillable = [
        'name',
        'quantity',
        'total_straw',
        'price',
        'total_price',
        'date',
    
    ];
    use HasFactory;
}
