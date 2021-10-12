@extends('master.master')
@section('nav','View Rooms')

@section('contiener') 

<div class="col-12 col-sm-12">
      <!-- Default box -->
      <div class="card card-yellow ">
        <div class="card-header">
          <h3 class="card-title"> <i class="fas fa-building"></i> View Rooms</h3>
        </div>

        <div class="card-body ">
          <div class="row">
            
            <table class="table table-hover table-sm ml-3 text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Room label</th>
                  <th>Floor</th>
                  <th>Room name</th>
                  <th>Room type</th>
                  <th>Office Name</th>
                  <th>Rome size</th>
                  <th>No.chairs</th>
                  <th>whiteboard</th>
                  <th>Capacity</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @if(isset($vr))
                @if(count($vr))
                @php $cout = 1 @endphp
                @foreach ($vr as $room)
                  <tr>
                    <td>{{ $cout  }}</td>
                    <td>{{ $room->name }}</td>
                    <td>
                   
                    @if($room->floor=='g0')
                     {{'G+0'}}
                     @elseif($room->floor=='g1')
                     {{'G+1'}}
                     @elseif($room->floor=='g2')
                     {{'G+2'}}
                     @elseif($room->floor=='g3')
                     {{'G+3'}}
                     @elseif($room->floor=='g4')
                     {{'G+4'}}
                     @elseif($room->floor=='g5')
                     {{'G+5'}}
                    @endif 
                   
                    </td>
                    <td>{{ $room->bid }}</td>
                    <td>
                        @if($room->room_type_id=='cr')
                        {{'Class room'}}
                        @elseif($room->room_type_id=='of')
                        {{'Office'}}
                        @elseif($room->room_type_id=='la')
                        {{'Labratory'}}
                        @elseif($room->room_type_id=='li')
                        {{'Library'}}
                        @endif 
                    </td>
                    <td>{{ $room->officename }}</td>
                    <td>{{ $room->roomsize }}</td>
                    <td>{{ $room->noofchair }}</td>
                    <td>{{ $room->whiteboard }}</td>
                    <td>{{ $room->capacity }}</td>
                   
                    <td>
                      <a href="{{ url('edit_room/'.$room->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('delete_rm/'.$room->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                @php $cout++ @endphp
                @endforeach
                @else
                <tr>
                  <td colspan="5"> <center> <i class="fa fa-aye"></i> not saved buildings </center> </td>
                </tr>
                @endif
              @endif
              </tbody>
            </table>

        
          </div>                 
        </div>
        
        </div>
        <!-- /.card-body -->
   </div>

@endsection