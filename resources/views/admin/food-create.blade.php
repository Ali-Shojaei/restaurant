@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-12">
      <!-- Default box -->
       <form action="{{ route('FoodInsert') }}" method="post">
        @csrf
      <!-- <div class="card"> -->
        <div class="card-body">P
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name">
            @error('Name')
                <span style="color: red">نام نمیتواند خالی باشد</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="Price">Price</label><br>
            <input type="number" class="form-control" id="Price" name="Price">
            @error('Price')
                <span style="color: red">قیمت نمیتواند خالی باشد</span>
            @enderror
          </div>
            <div class="form-group">
              <label for="Category">Category</label>
            <select name="Category" id="Category" class="form-control">     
              @foreach ($categories as $Category)
              <option value="{{ $Category->id }}">{{ $Category->Name }}</option>
              @endforeach   
              
        
            </select>
            </div>
          <div class="form-group">
            <label for="Restaurant">Restaurant</label>
          <select name="Restaurant" id="Restaurant" class="form-control">
           @foreach ($restaurants as $restaurant)
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