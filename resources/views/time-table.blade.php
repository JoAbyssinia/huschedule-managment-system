@extends('master.master')
@if(isset($edittt))
@section('nav','Edit time-table')
@else
@section('nav','Add time-table')
@endif
@section('contiener') 

<div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-building"></i> 
                @if(isset($edittt))
                 {{'Edit'}}
                 @else
                  {{'Add'}}
                  @endif
                 time-table</h3>
              </div>
              <form action=" 
              @if(isset($edittt))
               {{ url('edittime') }}
                 @else
                 {{url('add_time')}}
                  @endif
               " method="get">
              {{ csrf_field() }}
              <div class="card-body ">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Label</label>
                      @if(isset($edittt))
                      <input type="hidden" name="id" value="{{ $edittt->id }}">
                      <input type="text" name="name" value="{{ $edittt->name}}" class="form-control" required id="exampleInputEmail1" placeholder="Enter label">
                      @else
                      <input type="text" name="name" class="form-control" required id="exampleInputEmail1" placeholder="Enter label">
                      @endif
                    </div>
                    <div class="form-group">
                     <label> Set time frame</label>
                      <div class="row">
                        <div class="col-2"> <strong>Start time</strong></div>
                        <div class="col-4">
                        @if(isset($edittt))
                       
                        <input name="stime" type="time" value="{{$edittt->start}}" class="form-control" required>
                        @else
                        <input name="stime" type="time" class="form-control" required>
                        @endif
                        </div>
                        <div class="col-2 "><strong>End time</strong></div>
                        <div class="col-4">
                        @if(isset($edittt))
                        <input name="etime" value="{{$edittt->end}}"  type="time" class="form-control">
                        @else
                        <input  name="etime"  type="time" class="form-control">
                        @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Modality</label>
                      <select name="modality" class="form-control select2" style="width: 100%;">
                        <option value="1">Regular</option>
                        <option value="2">Extention</option>
                        <option value="3">Weekend</option>
                      </select>
                    </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> 
                     @if(isset($edittt))
                        Edit
                     @else
                     Add
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