<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodBasket extends Model
{
    protected $fillable= ['food_id' , 'restaurant_id' , 'count' , 'user_id' , 'is_payed'];

    public function Restaurant()
    {
        return $this->belongsTo(restaurant::class)->first();
    }

    public function Food()
    {
        return $this->belongsTo(Food::class)->first();
    }
}
