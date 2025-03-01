<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\restaurant;
use App\Models\Food;
use App\Models\Category;
use Directory;
use PDO;
use App\Http\Requests\RestaurantCreate;
use App\Http\Requests\CategoryCreate;
use App\Http\Requests\FoodCreate;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{

    public function admin(){
        return view('layout.admin');
    }

    public function category(){
      
        return view('admin.category' , ['categories' => Category::all()]);
     }
  
     public function food(){
       $foods = Food::where('is_hide' ,'=', 0)->get();
      
      
      return view('admin.food' , ['foods' => $foods]);
     }


     public function restaurant(){
        return view('admin.restaurant' , ['restaurants' => restaurant::all()]);
     }

    
      public function RestaurantCreate(){
         return view('admin.restaurant-create');
      }

      public function RestaurantInsert(RestaurantCreate $request){
         $request->validated();
         $title = $request->input('title'); 
         $address = $request->input('address');
         $image = time().'-'.$request->file('image')->getClientOriginalName();
         $request->file('image')->move(public_path('image'), $image);
         $is_slide = $request->input('is_slide');
         Restaurant::Create([
            'title' => $title,
            'address' => $address,
            'image' => $image,
            'is_slide' => $is_slide ?? 0
         ]);

         return redirect(route('restaurantList'));
      }
    

     public function CategoryCreate(){
        return view('admin.category-create');
     }

     public function CategoryInsert(CategoryCreate $request){
        $request->validated();
        $name = $request->input('Name');
        $Description = $request->input('Description');         
        Category::Create([
            'Name' => $name,
            'Description' => $Description
        ]);

        return redirect(route('categoryList'));
     }

     public function FoodCreate(){
        $Category = Category::all();
        $Restaurant = restaurant::all();
        return view('admin.food-create' , ['categories' => $Category] , ['restaurants' => $Restaurant]);
     }

     public function FoodInsert(FoodCreate $request){
       $request->validated();
        $Name = $request->input('Name');
        $price = $request->input('Price');
        $category = $request->input('Category');
        $restaurant = $request->input('Restaurant');

        Food::Create([
            'Name' => $Name,
            'Price' => $price,
            'Category_id' => $category,
            'Restaurant_id' => $restaurant

        ]);

        return redirect(route('foodList'));
     }

     public function RestaurantEdit($id){
      $restaurant = Restaurant::find($id);
      return view('admin.restaurant-edit' , ['restaurant' => $restaurant]);
     }

     public function RestaurantUpdate(Request $request){
            $restaurant = restaurant::findOrFail($request->input('id'));           
            $image = false;
            if($request->file('image')){
               $request->validate([               
                     'image' => 'required |mimes:png,jpg'
                   ]);
                   $image = time().'-'.$request->file('image')->getClientOriginalName();
                   $request->file('image')->move(public_path('image'), $image);
            }
            if ($restaurant->title != $request->input('title')){
               $request->validate([               
                  'title' => 'required|unique:restaurants,title'
                ]);
            }

            
                    
            if($image){
               $restaurant
               ->update([
                'title' => $request->input('title'),
                'address' => $request->input('address'),
                'image' => $image,
                'is_slide' => $request->input('is_slide') ?? 0
               ]);
            }
            else{
               $restaurant
               ->update([
                'title' => $request->input('title'),
                'address' => $request->input('address'),
                'is_slide' => $request->input('is_slide') ?? 0
               ]);
            }
          
           return redirect(route('restaurantList'));
     }

     public function CategoryEdit($id){
      $category = Category::find($id);
         return view('admin.category-edit' , ['Category' => $category]);
     }

     public function CategoryUpdate(CategoryCreate $request){
      $request->validated();
      Category::findOrFail($request->input('id'))
      ->update([
         'Name' => $request->input('Name'),
         'Description' => $request->input('Description')
      ]);
         return redirect(route('categoryList'));
     }

     public function FoodEdit($id){
         $food = Food::find($id);
         $Category = Category::all();
        $Restaurant = restaurant::all();
        return view('admin.food-edit' ,[
              'food' => $food,
              'categories' => $Category,
              'restaurants' => $Restaurant
        ]);
     }

     public function FoodUpdate(Request $request){       
        $food = Food::findOrFail($request->input('id'));

        if($food->Name != $request->input('Name')){
         $request->validate([
            'Name' => 'required|unique:food,Name',
            'Price' => 'required'
         ]);
         Food::findOrFail($request->input('id')) //در واقع این آیدی از همون آیدی مخفی تو ادیت فود میاد
         ->update([
              'Name' => $request->input('Name'),
              'Price' => $request->input('Price'),
              'Category_id' => $request->input('Category'),
              'Restaurant_id' => $request->input('Restaurant')
         ]);
        }
        else{
         $request->validate([
            'Price' => 'required'
         ]);
         Food::findOrFail($request->input('id')) //در واقع این آیدی از همون آیدی مخفی تو ادیت فود میاد
            ->update([
                 'Name' => $request->input('Name'),
                 'Price' => $request->input('Price'),
                 'Category_id' => $request->input('Category'),
                 'Restaurant_id' => $request->input('Restaurant')
            ]);
        }
           

            return redirect(route('foodList'));
     }

     public function RestaurantDelete($id)
     {
      Restaurant::findOrFail($id)
      ->delete();
      

      return redirect(route('restaurantList'));
     }

     public function CategoryDelete($id){
      Category::findOrFail($id)
      ->delete();

      return redirect(route('categoryList'));
     }

     public function FoodDelete($id)
     {
      Food::findOrFail($id)->where('id' ,'=', $id)
      ->update([
          'is_hide' => 1
      ]);

      return redirect(route('foodList'));
     }

     public function Logout(){
       
     }
}
