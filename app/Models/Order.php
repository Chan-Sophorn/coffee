<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function CoffeeName(){
        return $this->belongsTo(CoffeeName::class, 'name_id');
    }

    public function CoffeeType(){
        return $this->belongsTo(CoffeeType::class, 'type_id');
    }
     public function Cup(){
        return $this->belongsTo(Cup::class, 'size_id');
    }
}
