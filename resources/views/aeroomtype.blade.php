@extends('master.master')
@if(isset($editrt)!=null)
@section('nav','Edit room-type')
@else
@section('nav','Add room-type')
@endif

@section('contiener') 

<div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-building"></i>
                 @if(isset($editrt))
                 {{'Edit'}}
                 @else
                  {{'Add'}}
                  @endif
                 room type</h3>
              </div>
              <form action="
              @if(isset($editrt))
              {{ url('editr') }}
              @else
              {{ url('addrt') }}
              @endif
              
              " method="GET">
              {{ csrf_field() }}
              <div class="card-body ">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Room type</label>
                      @if(isset($editrt) !=null)
                      <input type="hidden" value="{{$editrt->id}}" name="id">
                      <input type="text" name="name" value="{{$editrt->name}}" class="form-control" id="exampleInputEmail1" required placeholder="Enter room type ">  
                      @else
                      <input type="text" name="name"  class="form-control" id="exampleInputEmail1" required placeholder="Enter building name">
                      @endif
                    </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> 
                      @if(isset($editrt))
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