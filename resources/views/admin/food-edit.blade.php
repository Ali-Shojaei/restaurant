@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-12">
      <!-- Default box -->
       <form action="{{ route('FoodUpdate') }}" method="post">
        @csrf
      <!-- <div class="card"> -->
        <div class="card-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $food->id }}">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" value="{{ $food->Name }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="Price">Price</label><br>
            <input type="number" class="form-control" id="Price" value="{{ $food->Price }}" name="Price">
          </div>
          <div class="form-group">
            <label for="Category">Category</label>
          <select name="Category" id="Category" class="form-control">     
            @foreach ($categories as $Category)
            @if ($Category->id == $food->Category_id)
            <option value="{{ $Category->id }}"selected>{{ $Category->Name }}</option>    
            @endif
            <option value="{{ $Category->id }}">{{ $Category->Name }}</option>
            @endforeach   
            
       
          </select>
          </div>
          <div class="form-group">
            <label for="Restaurant">Restaurant</label>
          <select name="Restaurant" id="Restaurant" class="form-control">
            @foreach ($restaurants as $restaurant)
                @if ($restaurant->id == $food->Restaurant_id)
                    <option value="{{ $restaurant->id }}" selected>{{ $restaurant->title }}</option>
                @endif
                <option value="{{ $restaurant->id }}">{{ $restaurant->title }}</option>
            @endforeach
          </select>
          </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">submit</button>
        </div>
      </form>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
  </div>
  @endsection