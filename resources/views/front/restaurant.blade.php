@extends('layout.home')  

@section('content')  

<div class="container-fluid"></div>  
<div class="container">  
    
    <div class="row">  
        <div class="card" style="width: 70rem; margin-left: 18px; margin-top: 10px;">  
            <div class="card-body">     
                <h5 class="card-title">{{ $restaurant->title }}</h5>    
                <img style="border-radius: 5px; border: 1px solid black;" src="{{ asset('Image/'.$restaurant->image) }}" width="1050" height="450" >  
                <p style="margin-top: 10px;" class="card-title">{{ $restaurant->address }}</p>  
            </div>  
        </div>  
    </div>  
</div>  

    <a style="margin-top: 10px;" class="btn btn-warning" href="{{ route('restaurant' , ['id' => $restaurant->id]) }}" >all</a>
    @foreach ($categories as $category )
        <a style="margin-top: 10px; margin-right: 5px;" class="btn btn-secondary" href="{{ route('restaurant' , ['id' => $restaurant->id , 'category' => $category->id]) }}" >{{ $category->Name }}</a>
    @endforeach

<div class="container-fluid"></div>  
<div class="container">  
    <div class="row justify-content-center">          
        @foreach ($food as $food1)               
            <div style="margin-top: 20px" class="col-md-4 mb-4"> <!-- تغییر به col-md-4 برای ۳ تایی چیده شدن -->  
                <div class="card" style="background-color: rgb(221, 191, 191);">  
                    <div class="card-body text-center">     
                        <h5 class="card-title">{{ $food1->Name }}</h5>  
                        <img style="border-radius: 5px; border: 1px solid rgb(122, 110, 110);" src="{{ asset('Image/'.$restaurant->image) }}" width="200" height="100">    
                        <p class="my-3">{{ $food1->Price." قیمت به ریال" }}</p>   
                        @if (Auth::user())
                        <a class="btn btn-primary mt-1" href="{{ route('basket.add' , ['food_id' => $food1->id , 'restaurant_id' => $restaurant->id]) }}" style="color: white;" class="nav-link">Add</a>
                        @endif                    
                         
                    </div>  
                </div>  
            </div>  
        @endforeach  
    </div>  
</div>  

@endsection