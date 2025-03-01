
@extends('layout.admin')

@section('content')

<div class="row">

          <div class="col-12">
            
            <!-- /.card -->
            
            <div class="card">
              <div class="card-header">
                <h1 class="m-0 mt-1">Food</h1>
                <h3 class="card-title mt-4">click for Add new row</h3>
                <br>
                <td>                       
                <a href="{{ route('FoodCreate') }}" id="border12" type="button" class="btn btn-block btn-success col-2 mt-4">Add+</a>                                     
                </td>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>نام</th>
                    <th>قیمت</th>
                    <th>رستوران</th>
                    <th>دسته بندی</th>
                    <th>حذف</th>
                    <th>ویرایش</th>
                  </tr>         
                  </thead>
                  <tbody>
                      @foreach ($foods as $food)  
                      <tr>       

                        <td>{{ $food->Name }}</td>
                        <td>{{ $food->Price }}</td>            
                        <td>{{ $food->Restaurant()->Name }}</td>
                        <td>{{ $food->Category()->Name }}</td>
                            
                        
                        
                        <td><a href="{{ route('FoodDelete' , ['id' => $food->id]) }}">حذف</a></td>
                        <td><a href="{{ route('FoodEdit' , ['id' => $food->id]) }}">ویرایش</a></td>
  
                      </tr> 
                      @endforeach                              
                      
                                     
                  </tbody>
                   
                              
                  <tfoot>
                  <tr>
                    <th>نام</th>
                    <th>قیمت</th>
                    <th>رستوران</th>
                    <th>دسته بندی</th>
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