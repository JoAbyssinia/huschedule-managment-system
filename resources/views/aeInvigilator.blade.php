@extends('master.master')
@if(isset($editInvigilator))
@section('nav','Edit Invigilator')
@else
@section('nav','Add Invigilator')
@endif
@section('contiener')


<div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-building"></i>
                 @if(isset($editInvigilator))
                 {{'Edit'}}
                 @else
                  {{'Add'}}
                  @endif
                 Invigilator</h3>
              </div>
              <form action="
              @if(isset($editInvigilator))
              {{ url('edit_invigilator') }}
                 @else
                 {{ url('add_invigilator') }}
              @endif
              " method="GET">
              {{ csrf_field() }}
              <div class="card-body ">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">First name</label>
                      @if(isset($editInvigilator) !=null)
                      <input type="hidden" value="{{$editInvigilator->id}}" name="id">
                      <input type="text" name="fname" value="{{$editInvigilator->name}}" class="form-control" id="exampleInputEmail1" required placeholder="Enter first name">  
                      @else
                      <input type="text" name="fname"  class="form-control" id="exampleInputEmail1" required placeholder="Enter first name">
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Last name</label>
                      @if(isset($editInvigilator) !=null)
                      <input type="hidden" value="{{$editInvigilator->id}}" name="id">
                      <input type="text" name="lname" value="{{$editInvigilator->name}}" class="form-control" id="exampleInputEmail1"  placeholder="Enter last name">  
                      @else
                      <input type="text" name="lname"  class="form-control" id="exampleInputEmail1"  placeholder="Enter last name">
                      @endif
                    </div>

                    <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> 
                      @if(isset($editInvigilator))
                      {{'Edit'}}
                      @else
                      {{'Add'}}
                      @endif
                      </button>
                    </div>
                  </div>          

              
                </div>                 
                </div>
              </form>
         </div>
              <!-- /.card-body -->
</div>



@endsection