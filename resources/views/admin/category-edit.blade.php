@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-12">
      <!-- Default box -->
       <form action="{{ route('CategoryUpdate') }}" method="post">
        @csrf
      <!-- <div class="card"> -->
        <div class="card-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $Category->id }}">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="Name" value="{{ $Category->Name }}" name="Name" placeholder="Enter Name">
            @error('Name')
                <span style="color: red">نام نمیتواند خالی باشد</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="Address">Description</label><br>
            <textarea style="resize: none; border-radius: 5px;" name="Description" id="Description" rows="3" cols="143">{{ $Category->Description }}</textarea>
          @error('Description')
              <span style="color: red">توضیحات نمیتواند خالی باشد</span>
          @enderror
          </div>
          <div class="form-group"></div>
                      
          <div class="form-group">                 
            
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary ">submit</button>
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