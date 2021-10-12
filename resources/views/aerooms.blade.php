@extends('master.master')
@if(isset($editroom))
@section('nav','Edit room')
@else
@section('nav','Add Room')
@endif
@section('contiener') 


<div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-building"></i> 
                  @if(isset($editroom))
                 {{'Edit'}}
                 @else
                  {{'Add'}}
                  @endif
                 room</h3>
              </div>
              <form action="
              @if(isset($editroom))
              {{ url('editroom') }}
              @else
              {{ url('addroom') }}
              @endif
              " method="GET">
              {{ csrf_field() }}
              <div class="card-body ">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Room label</label>
                      @if(isset($editrt) !=null)
                        <input type="hidden" value="$editroom->id" name="id" >
                        <input type="name" value="$editroom->name" class="form-control" required id="exampleInputEmail1" placeholder="Enter room label"> 
                      @else
                       <input type="text" name="name" class="form-control" required id="exampleInputEmail1" placeholder="Enter room label">
                      @endif
                     
                    </div>
                    <div class="form-group">
                      <label>Building </label>
                      <select name="building" class="form-control select2" style="width: 100%;">
                        @foreach($buliding as $build)
                        <option value="{{$build->id}}">{{ucwords($build->name)}}</option>
                        @endforeach
                      </select>
                    </div>

                   
                    <div class="form-group">
                      <label>Floor </label>
                      <select name='floor' class="form-control select2" style="width: 100%;">
                        <option value="g0">G+0</option>
                        <option value="g1">G+1</option>
                        <option value="g2">G+2</option>
                        <option value="g3">G+3</option>
                        <option value="g4">G+4</option>
                        <option value="g5">G+5</option>
                       
                      </select>
                    </div>
                   

                    <div class="form-group">
                      <label>Room type </label>
                      <select class="form-control select2" name="roomt" id="roomt" style="width: 100%;">
                        @foreach($rtype as $rt)
                        <option value="
                        @if($rt->name=='Class Room')
                        {{'cr'}}
                        @elseif($rt->name=='Office')
                        {{'of'}}
                        @elseif($rt->name=='Laboratory')
                        {{'la'}}
                        @elseif($rt->name=='Library')
                        {{'li'}}
                        @endif">{{$rt->name}}</option>
                        @endforeach
                        
                       
                      </select>
                    </div>

                    <div class="form-group" id="offic">
                     
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Room size</label>
                      <input type="number" step="0.01" name="rsize" class="form-control"  id="exampleInputEmail1" placeholder="Enter room size">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">No. or chairs </label>
                      <input type="number" name="noch" class="form-control"  id="exampleInputEmail1" placeholder="Enter number of chairs">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">No. or whiteboard </label>
                      <input type="number" name="nowh" class="form-control"  id="exampleInputEmail1" placeholder="Enter number of whiteboards">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Capacity </label>
                      <input type="number" name="cap" class="form-control" id="exampleInputEmail1" placeholder="Enter capacity(defualt is 50)" value="50">
                    </div>
                   
                    <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> add</button>
                    </div>
                  </div>          

              
                </div>                 
                </div>
              </form>
              </div>
              <!-- /.card-body -->
          </div>


@endsection