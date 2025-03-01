
@extends('layout.admin')

@section('content')

<div class="row">

          <div class="col-12">
            
            <!-- /.card -->
            
            <div class="card">
              <div class="card-header">
                <h1 class="m-0 mt-1">Restaurant</h1>
                <h3 class="card-title mt-4">click for Add new row</h3>
                <br>
                <td>                       
                <a href="{{ route('RestaurantCreate') }}" id="border12" type="button" class="btn btn-block btn-success col-2 mt-4">Add+</a>                                     
                </td>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>نام</th>
                    <th>آدرس</th>    
                    <th>تصویر</th>          
                    <th>حذف</th>
                    <th>ویرایش</th>
                  </tr>         
                  </thead>
                  <tbody>
                      @foreach ($restaurants as $restaurant)
                      <tr>       

                        <td>{{ $restaurant->title }}</td>
                        <td>{{ $restaurant->address }}</td>
                        <td><img src="{{ asset('image/'.$restaurant->image)  }}" style="border-radius: 5px;  border: 1px solid rgb(134, 116, 116)" width="80" height="50" alt=""></td>
                        
                        <th><a href="{{ route('RestaurantDelete' , ['id' => $restaurant->id]) }}">حذف</a></th>
                        <th><a href="{{ route('RestaurantEdit' , ['id' => $restaurant->id]) }}">ویرایش</a></th>
  
                      </tr> 
                      @endforeach                              
                      
                                     
                  </tbody>
                   
                              
                  <tfoot>
                  <tr>
                    <th>نام</th>
                    <th>آدرس</th>
                    <th>تصویر</th>
                    <th>حذف</th>
                    <th>ویرایش</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
  
  @endsection