@extends('master.master')
@if(isset($editd)!=null)
@section('nav','Edit Building')
@else
@section('nav','Add Building')
@endif
@section('contiener')
 
<div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-building"></i>
                 @if(isset($editd))
                 {{'Edit'}}
                 @else
                  {{'Add'}}
                  @endif
                 building</h3>
              </div>
              <form action="
              @if(isset($editd))
              {{ url('edit') }}
                 @else
                 {{ url('add_building') }}
              @endif
              " method="GET">
              {{ csrf_field() }}
              <div class="card-body ">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Building name</label>
                      @if(isset($editd) !=null)
                      <input type="hidden" value="{{$editd->id}}" name="id">
                      <input type="text" name="name" value="{{$editd->name}}" class="form-control" id="exampleInputEmail1" required placeholder="Enter building name">  
                      @else
                      <input type="text" name="name"  class="form-control" id="exampleInputEmail1" required placeholder="Enter building name">
                      @endif
                    </div>
                    <div class="form-group">
                      <label>ownarship type</label> 
                      <select name="type" class="form-control select2" style="width: 100%;">
                        @if(isset($editd))
                              @if($editd->type=="own")
                              <option selected >own</option>
                              @else
                              <option>own</option>
                              @endif
                         @else
                          <option>own</option>  
                        @endif

                        @if(isset($editd))
                              @if($editd->type=="rent")
                              <option selected >rent</option>
                              @else
                              <option>rent</option>
                              @endif
                         @else
                          <option>rent</option>  
                        @endif
                      </select>
                    </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> 
                      @if(isset($editd))
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
