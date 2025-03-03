<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function Food(){
        return $this->hasMany(Food::class)->get();
    }

    protected $fillable = ['Name' , 'Description'];
}
