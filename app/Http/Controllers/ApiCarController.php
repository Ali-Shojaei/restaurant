<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiCarController extends Controller
{
    public function index(){
        return Car::all();
    }

    public function Car(Request $request){
        $validator = Validator::make($request->all(), [         
            'Name' => 'required',
            'Model' => 'required',
            'Color' => 'required'
        ]);
        if ($validator->fails()) {  
            return response()->json($validator->errors(), 422);  
        
        } else{
            return Car::create($request->all());
        }
          
    }
}
