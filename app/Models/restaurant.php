<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Eloquent;


use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    use HasFactory;
    public function Food(){
        return $this->hasMany(Food::class)->get();
    }

    protected $fillable = ['title' , 'address' , 'image' , 'counter' , 'is_slide'];
}
