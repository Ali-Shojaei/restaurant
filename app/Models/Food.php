<?php

namespace App\Models;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
      use HasFactory;
    public function Restaurant()
    {
        return $this->belongsTo(restaurant::class , 'Restaurant_id')->first();
    }

    public function Category(){
        return $this->belongsTo(Category::class , 'Category_id')->first();
    }

    protected $fillable = ['Name' , 'Price' , 'Category_id' , 'Restaurant_id'];
}
