@extends('layout.home') 

@section('content')
@foreach ($baskets as $basket )
  
<h2>Name :: {{ $basket->Food()->Name }}</h2>
<h2>Price :: {{ $basket->Food()->Price }}</h2>
<h2>Count :: {{ $basket->count }}</h2>
<a class="btn btn-info" href="{{ route('Shopping.delete' , ['id' => $basket->id]) }}">حذف</a>  
<br>

@endforeach

<a class="nav-link btn btn-warning" style="font-family: 'IranSansWeb'; color: rgb(8, 6, 6);" href="{{ route('checkout' , ['user_id' => Auth::user()->id]) }}">پرداخت</a>

    


@endsection

