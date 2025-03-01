
@extends('layout.admin')

@section('content')

<div class="row">

          <div class="col-12">
            
            <!-- /.card -->
            
            <div class="card">
              <div class="card-header">
                <h1 class="m-0 mt-1">Category</h1>
                <h3 class="card-title mt-4">click for Add new row</h3>
                <br>
                <td>                       
                <a href="{{ route('CategoryCreate') }}" id="border12" type="button" class="btn btn-block btn-success col-2 mt-4">Add+</a>                                     
                </td>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>نام</th>
                    <th>توضیحات</th>
                    <th>حذف</th>
                    <th>ویرایش</th>
                  </tr>         
                  </thead>
                  <tbody>
                      @foreach ($categories as $Category)
                      <tr>       

                        <th>{{ $Category->Name }}</th>
                        <th>{{ $Category->Description }}</th>
                        
                        <th><a href="{{ route('CategoryDelete' , ['id' => $Category->id]) }}">حذف</a></th>
                        <th><a href="{{ route('CategoryEdit' , ['id'=> $Category->id]) }}">ویرایش</a></th>
  
                      </tr> 
                      @endforeach                              
                      
                                     
                  </tbody>
                   
                              
                  <tfoot>
                  <tr>
                    <th>نام</th>
                    <th>توضیحات</th>
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