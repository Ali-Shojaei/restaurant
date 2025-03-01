@extends('layout.home')

@section('content')

<div class="row mt-2 justify-content-center">  
    <form action="{{ route('serach') }}" class="d-flex">  
        <div class="input-group">  
            <input name="q" type="text" class="form-control" placeholder="search" aria-label="Search">  
            <button type="submit" class="btn btn-primary">  
                
<lord-icon
    src="https://cdn.lordicon.com/qxvhathv.json"
    trigger="morph"
    state="morph-check"
    colors="primary:#121331,secondary:#ebe6ef,tertiary:#4bb3fd,quaternary:#5c0a33"
    style="width:30px;height:30px">
</lord-icon> 
            </button>  
        </div>  
    </form>  
</div>
<div class="row">
    {{-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1"> <!-- تغییر به ۳ ثانیه --> --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div style="border-radius: 10px;" class="carousel-inner">
        @php
            $counter = 0;
        @endphp
        @foreach ($RestaurantSlider as $Slider )
        <div class="carousel-item {{ $counter == 0 ? 'active' : '' }}">
        
        {{-- <div style="border-radius: 10px;" class="carousel-inner"> --}}       
            <img style="height: 400px;" src="{{ asset('Image/'.$Slider->image) }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>{{ $Slider->title }}</h5>
              <p>{{ $Slider->address }}</p> 
            </div>
          </div>
          @php
              $counter++;
          @endphp  
          @endforeach       
          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
</div>

<div class="row" style="margin-top: 20px ">
    <h2 style="font-family: 'IranSansWeb';" >جدید ترین رستوران ها!</h2>
    @foreach ($restaurants as $restaurant)
    <div class="col-md-2" style="margin: 10px 8px;">
        <div class="card" style="width: 100%;">
        <div class="card-body">
    <a href="{{ route('restaurant' , ['id' => $restaurant->id]) }}">   
    <h5 class="card-title">
        {{ $restaurant->title }}
    </h5>
    </a>
    <img style="border-radius: 5px; border: 1px solid black;" src="{{ asset('Image/'.$restaurant->image) }}" width="100%" height="auto" >
    <p style="margin-top: 10px;" class="card-title">
        {{ $restaurant->address }}
    </p>
</div>  
</div>  
</div>  
@endforeach  
</div>  

<div class="row" style="margin-top: 20px">
    <h2 style="font-family: 'IranSansWeb';" >محبوب ترین ها</h2>
    @foreach ($bestRestaurants as $restaurant)
    <div class="col-md-2" style="margin: 10px 8px;">
        <div class="card" style="width: 100%;">
        <div class="card-body">
    <a href="{{ route('restaurant' , ['id' => $restaurant->id]) }}">   
    <h5 class="card-title">
        {{ $restaurant->title }}
    </h5>
    </a>
    <img style="border-radius: 5px; border: 1px solid black;" src="{{ asset('Image/'.$restaurant->image) }}" width="100%" height="auto" >
    <p style="margin-top: 10px;" class="card-title">
        {{ $restaurant->address }}
    </p>
</div>  
</div>  
</div>  
@endforeach  
</div>  


<div class="row" style="margin-top: 20px">
    <h2 style="font-family: 'IranSansWeb';" >دسته بندی</h2>
    @foreach ($Categories as $Category)
    <div class="col-md-2" style="margin: 10px 8px;">
        <div class="card" style="width: 100%;">
        <div class="card-body">
    <a href="{{ route('category' , ['id' => $Category->id]) }}">
    <h5 class="card-title">
        {{ $Category->Name }}
    </h5>
    </a>       
</div>  
</div>  
</div>  
@endforeach  
</div>  

<div class="row mt-1">
    <h2>تعداد کاربران</h2>
    <div class="col-md-2" style="margin: 10px 8px;">
    <p>{{ $UsersCount }}</p>
    </div>
</div>
@endsection


{{-- @extends('layout.home')  

@section('content')  
<div class="row">  
    @foreach ($restaurants as $restaurant)  
        <div class="col-md-3" style="margin: 10px 8px;">  <!-- تغییر این قسمت -->  
            <div class="card" style="width: 100%;">  
                <div class="card-body">  
                    <a href="{{ route('restaurant', ['id' => $restaurant->id]) }}">  
                        <h5 class="card-title">{{ $restaurant->Name }}</h5>  
                    </a>  
                    <img style="border-radius: 5px; border: 1px solid black;" src="{{ asset('Image/' . $restaurant->image . '.jpg') }}" width="100%" height="auto">  
                    <p style="margin-top: 10px;" class="card-title">{{ $restaurant->address }}</p>  
                </div>  
            </div>  
        </div>  
    @endforeach  
</div>  
@endsection --}}