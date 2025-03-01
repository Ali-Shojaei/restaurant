@extends('layout.admin')

@section('content')
<link rel="stylesheet" href="style.css">
<div class="row">
    <div class="col-12">
      <!-- Default box -->
       <form action="{{ route('RestaurantUpdate') }}" method="post" enctype="multipart/form-data">
        @csrf
      <!-- <div class="card"> -->
        <div class="card-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $restaurant->id }}">
            <label for="title">Name</label>
            <input type="text" class="form-control" value="{{ $restaurant->title }}" id="title" name="title" placeholder="Enter Name">
            @error('Name')
              <span style="color: red">نام نمیتواند خالی باشد</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="slide">آیا در اسلاید نمایش داده شود؟</label>
            <input type="checkbox" style="margin-LEFT: -510px;" class="form-control" id="slide" name="is_slide"  value=1 {{ $restaurant->is_slide == 1 ? 'checked' : '' }}>
          </div>
          <div class="form-group">
            <label for="Address">Address</label><br>
            <textarea style="resize: none; border-radius: 5px;" name="address" id="address" rows="3" cols="143">{{ $restaurant->address }}</textarea>
            @error('address')
              <span style="color: red">تعداد کاراکتر های وارد شده بیش از حد مجاز است</span>
            @enderror
          </div>
          <div class="form-group"></div>
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Enter Name">
            <h4 style="font-family: 'Vazir'; margin-top: 5px;">عکس فعلی رستوران</h4>
            <img style="border-radius: 5px; border: 1px solid rgb(122, 110, 110);" src="{{ asset('Image/'.$restaurant->image) }}" width="200" height="100">   
            @error('image')
              <span style="color: red">توجه داشته باشید که فرمت فایل انتخابی باید jpg یا png باشد</span>
            @enderror
          </div>
          <div class="form-group">                 
            
          </div>
          <div class="form-group">
            <button style="margin-left: 20px" type="submit" class="btn btn-primary ">submit</button>
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