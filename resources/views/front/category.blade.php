@extends('layout.home') 

@section('content')
<div class="container-fluid"></div>  
<div class="container">  
    <div class="row justify-content-center">          
        @foreach ($category->Food() as $food1)               
            <div style="margin-top: 20px" class="col-md-4 mb-4"> <!-- تغییر به col-md-4 برای ۳ تایی چیده شدن -->  
                <div class="card" style="background-color: rgb(221, 191, 191);">  
                    <div class="card-body text-center">     
                        <h5 class="card-title">{{ $food1->Name }}</h5>                                          
                        {{-- <img style="border-radius: 5px; border: 1px solid rgb(122, 110, 110);" src="{{ asset('Image/'.$restaurant->image) }}" width="200" height="100">     --}}
                        <p class="my-3">{{ $food1->Price." قیمت به ریال" }}</p>                       
                        <button class="btn btn-primary mt-1">View Food</button>  
                    </div>      
                </div>  
            </div>  
        @endforeach  
    </div>  
</div>  
@endsection