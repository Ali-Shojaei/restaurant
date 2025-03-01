@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-12">
      <!-- Default box -->
       <form action="{{ route('RestaurantInsert') }}" method="post" enctype="multipart/form-data">
        @csrf
      <!-- <div class="card"> -->
        <div class="card-body">
          <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Name">
            @error('title')
              <span style="color: red">نام نمیتواند خالی باشد</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="slide">آیا در اسلاید نمایش داده شود؟</label>
            <input type="checkbox" style="margin-LEFT: -510px;" value=1 class="form-control" id="slide" name="is_slide">
          </div>
          <div class="form-group">
            <label for="Address">Address</label><br>
            <textarea style="resize: none; border-radius: 5px;" name="address" id="address" rows="3" cols="143"></textarea>
            @error('address')
            <span style="color: red">تعداد کاراکتر های وارد شده بیشتر از حد مجاز میباشد</span>
              
            @enderror
          </div>
          <div class="form-group"></div>
            <label for="Image">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Enter Name">
            @error('image')
              <span style="color: red" >توجه داشته باشید که فایل های انتخابی باید با فرمت های png یا jpg باشند </span>
            @enderror
          </div>
          <div class="form-group">                 
            <input type="hidden" class="form-control" id="id" name="id">
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