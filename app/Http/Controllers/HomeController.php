<?php

namespace App\Http\Controllers;

use App\Mail\UserRegister;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\restaurant;
use App\Models\Food;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
   public function home(){
        // Mail::to('ali.shojaei2243@gmail.com')->send(new UserRegister());
        $restaurants = restaurant::orderBy('created_at', 'desc')->limit(5)->get();
        $bestRestaurants = restaurant::orderByDesc('counter')->limit(5)->get();
        $Categories = Category::all();
        $UsersCount = User::all()->count();
        $RestaurantSlider = restaurant::where('is_slide', '=' , 1)->orderByDesc('updated_at')->limit(3)->get();
        return view('front.index' ,
        ['restaurants' => $restaurants,
         'bestRestaurants' => $bestRestaurants,
         'Categories' => $Categories,
         'UsersCount' => $UsersCount,
         'RestaurantSlider' => $RestaurantSlider
       ]);
   }

   public function restaurant($id , Request $request)
   {
      $restaurant = restaurant::findOrfail($id);
      
       $categories = Category::all();
       if (($request->input('category'))){
         $foods = Food::where('Restaurant_id' , '=' , $restaurant->id)->where('is_hide' ,'=', 0)->where('Category_id' , '=' , $request->input('category'))->get();
       }
       else{
         $foods = Food::where('Restaurant_id' , '=' , $restaurant->id)->where('is_hide' ,'=', 0)->get();
       }
      restaurant::findOrFail($id)
      ->update([
            'counter' => $restaurant->counter + 1
      ]);
      return view('front.restaurant' , [
         'restaurant' => $restaurant,
         'food' => $foods,
         'categories' => $categories
      ]);
      
   }
   public function index()
    {
        return view('home');
    }

    public function search(Request $request){
      $q = ($request->get('q'));
      $restaurants = restaurant::where('title' , 'like' , '%'.$q.'%')->get(); 
      return view('front.serach' , ['restaurants' => $restaurants]);
    }

    public function category($id){
      $category = Category::find($id);
      return view('front.category' , ['category' => $category]);
    }

    public function hexa()
    {

    }
   

}
