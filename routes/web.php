<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Services\Infra\English;
use App\Services\Infra\Persian;
use App\Services\Welcome;
use Illuminate\Support\Facades\Auth;

Route::get('/' , [HomeController::class , 'home'])->name('home1');

Route::get('/Shopping/home' , [BasketController::class , 'Shopphome'])->name('Shopp.home');

Route::get('/checkout/{user_id}' , [BasketController::class , 'checkout'])->name('checkout');

Route::get('/Shopping/delete/{id}' , [BasketController::class , 'delete'])->name('Shopping.delete');

Route::get('/basket/add/{food_id}/{restaurant_id}' , [BasketController::class , 'add'])->name('basket.add');

Route::get('/admin' , [AdminController::class , 'admin'])->name('admin')->middleware(['auth' , 'Role']);   

Route::get('/serach' , [HomeController::class , 'search'])->name('serach');

Route::get('/category/{id}' , [HomeController::class , 'category'])->name('category');

Route::get('/restaurant/{id}' , [HomeController::class , 'restaurant'])->name('restaurant')->middleware(['auth']); 

Route::get('/admin/restaurant/list' , [AdminController::class , 'restaurant'])->name('restaurantList')->middleware(['auth' , 'Role']); 

Route::get('/admin/restaurant/create' , [AdminController::class , 'RestaurantCreate'])->name('RestaurantCreate')->middleware(['auth' , 'Role']); 

Route::post('/admin/restaurant/insert' , [AdminController::class , 'RestaurantInsert'])->name('RestaurantInsert')->middleware(['auth' , 'Role']); 

Route::get('/admin/restaurant/edit/{id}' , [AdminController::class , 'RestaurantEdit'])->name('RestaurantEdit')->middleware(['auth' , 'Role']); 
    
Route::post('/admin/restaurant/update' , [AdminController::class , 'RestaurantUpdate'])->name('RestaurantUpdate')->middleware(['auth' , 'Role']); 

Route::get('/admin/restaurant/delete/{id}' , [AdminController::class , 'RestaurantDelete'])->name('RestaurantDelete')->middleware(['auth' , 'Role']); 

Route::get('/admin/category/list' , [AdminController::class , 'category'])->name('categoryList')->middleware(['auth' , 'Role']); 

Route::get('/admin/category/create' , [AdminController::class , 'CategoryCreate'])->name('CategoryCreate')->middleware(['auth' , 'Role']); 

Route::post('/admin/category/insert' , [AdminController::class , 'CategoryInsert'])->name('CategoryInsert')->middleware(['auth' , 'Role']); 

Route::get('/admin/category/edit/{id}' , [AdminController::class , 'CategoryEdit'])->name('CategoryEdit')->middleware(['auth' , 'Role']); 

Route::post('/admin/category/update' , [AdminController::class , 'CategoryUpdate'])->name('CategoryUpdate')->middleware(['auth' , 'Role']); 

Route::get('/admin/category/delete/{id}' , [AdminController::class , 'CategoryDelete'])->name('CategoryDelete')->middleware(['auth' , 'Role']); 
        
Route::get('/admin/food/list' , [AdminController::class , 'food'])->name('foodList')->middleware(['auth' , 'Role']); 

Route::get('/admin/food/create' , [AdminController::class , 'FoodCreate'])->name('FoodCreate')->middleware(['auth' , 'Role']); 

Route::post('/admin/food/insert' , [AdminController::class , 'FoodInsert'])->name('FoodInsert')->middleware(['auth' , 'Role']); 

Route::get('/admin/food/edit/{id}' , [AdminController::class , 'FoodEdit'])->name('FoodEdit')->middleware(['auth' , 'Role']); 

Route::post('/admin/food/update' , [AdminController::class , 'FoodUpdate'])->name('FoodUpdate')->middleware(['auth' , 'Role']); 

Route::get('/admin/food/delete/{id}' , [AdminController::class , 'FoodDelete'])->name('FoodDelete')->middleware(['auth' , 'Role']); 




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout' , [LogoutController::class , 'Logout'])->name('Logout');
