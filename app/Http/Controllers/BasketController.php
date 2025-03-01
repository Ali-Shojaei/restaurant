<?php

namespace App\Http\Controllers;

use App\Models\FoodBasket;
use App\Models\restaurant;
use App\Models\Wallets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
          public function Shopphome(){      
            if(Auth::user()){
            $baskets = FoodBasket::where('user_id' ,'=', Auth::user()->id)->where('is_payed' ,'=', 0)->get();                            
           }
           
            return view('front.ShoppingBasket' , [
                'baskets' => $baskets           
            ]);
            
          }
          
        



           public function add($food_id , $restaurant_id)
           {

            $product = FoodBasket::where('user_id' , '=', Auth::user()->id)->
            where('restaurant_id' ,'=', $restaurant_id)->
            where('food_id' , '=' , $food_id)->
            where('is_payed' ,'=', 0)
            ->first();

            if($product){
                 $product->update(['count' => $product->count + 1]);
            }
            else{
                FoodBasket::create([
                    'food_id' => $food_id,
                    'restaurant_id' => $restaurant_id,
                    'count' => 1,
                    'user_id' => Auth::user()->id ?? 0
                ]);
            }              
                return redirect()->back();
           }




           public function checkout($id){
                $baskets = FoodBasket::where('user_id' ,'=', $id)->where('is_payed' ,'=', 0)->get();
                $wallet = Wallets::where('user_id' ,'=', $id)->first();

                $total = 0;
                foreach($baskets as $basket){
                $total = $total + $basket->Food()->Price * $basket->count;
                }


                if(isset($wallet->price) && $wallet->price >= $total){
                    foreach($baskets as $basket){
                        $basket->update([
                           'is_payed' => 1
                        ]);
                    }
                    $dd = $wallet->price - $total;
                    $wallet->update([
                        'price' => $dd
                    ]);

                    return redirect(route('home1'));
                }
                else{
                    return ('error');
                }
                
           }

           public function delete($id){
                  $basket = FoodBasket::where('user_id' ,'=', Auth::user()->id)->
                  where('id' ,'=', $id)->
                  where('is_payed' ,'=', 0)->
                  first();

                  if($basket){
                    $basket->delete();
                    return redirect()->back();
                  }
                  else{
                    echo 'error';
                  }
           }
}
