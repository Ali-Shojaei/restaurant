@extends('layout.home') 

@section('content')
<div class="row" style="margin-top: 20px ">
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
@endsection