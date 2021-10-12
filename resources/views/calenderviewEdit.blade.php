@inject('name', 'App\Http\Controllers\realnameController')
@inject('fetcher', 'App\Http\Controllers\fetchClassController')
@extends('master.master')
@section('nav','Report')
@section('contiener')

   
<div class="col-12 col-sm-12">
          
   <div class="card card-yellow ">
      <div class="card-header">
         <h3 class="card-title"> <i class="fas fa-edit"></i> Edit Class schedule </h3>
      
      <div class="card-tools m-0">
        <a href="{{--url('unassingedclass')--}}" class="btn btn-success text-white"> Save and exit </a> 
      </div>
    </div>
       
      <div class="card-body ">
      <div class="card col-12 p-1">
        
      <div class="card">
        <div class="card-header">
          List of Unassigned class
        </div>
        <div class="card-body">

        <table class="table">
            <tbody>
              <tr class="containerdd">
              @if(isset($unassign))
               @foreach($unassign as $un)
                <td class="draggable unassignlist" draggable="true">
                  <div class="row p-1 m-0 p-0" >
                    <input type="hidden" name="id" class="id" value="{{ $un->id }}">
                    <input type="hidden" class="section" value="{{ $un->section }}" >
                    <input type="hidden" class="course" value="{{ $un->course_id }}" >
                    <input type="hidden" class="instructor" value="{{ $un->instructor_id }}" >
                    
                    <div class="col-12">Section: {{ $name::section($un->section) }} </div>
                    <div class="col-12">Course: {{$name::course_title($un->course_id) }} </div>
                    <div class="col-12">Instructor: {{ $name::instrealname($un->instructor_id) }} </div> 
                    <div class="col-12">Term: {{ $un->term }} </div> 
                  </div>
                </td>
                @endforeach
              @endif  
              </tr>
            </tbody>
        </table>
          
        </div>
      </div>

             @if(isset($data))
             @foreach($data as $dept=>$tv)
                       
                       <div class="card col-12 p-1 table-responsive">
                           <table id="customcalendertable" class="table table-bordered table-sm  text-center table-cell-hover">
                               <thead class="thead-dark">
                               <tr>
                                   @php
                                       $d= count($data[$dept]);
                                   @endphp

                                       <th colspan="{{$d+2}}">
                                        {{ $dept}} - {{$batch}}
                                       </th>
                               </tr>
                               <tr>
                                   <th colspan="2" class="align-bottom" style="width: 5%">Section</th>
                                  
                                   @for($i=1;$i<=$d;$i++)
                                   <th> {{ $all_section[$i]}}  </th>
                                   @endfor

                               </tr>
                               </thead>
                               <tbody>
                               @foreach($time_table as $days)
                                   @php
                                   $check=0;
                                   @endphp
                                   @foreach($time as $my_time)
                                       <tr>
                                        
                                           @if($check==0) 

                                           <th rowspan="{{ sizeof($time) }}"
                                           class="align-middle pt-2 pb-2" 
                                           style="transform: rotate(-90deg);">{{ $name::date($days)}}</th>
                                               @php
                                                   $check=1;
                                               @endphp
                                           @endif
                                           <td class="align-middle" >{{$my_time->start}}-{{$my_time->end}}</td>
                                            @for($i=1;$i<=$d;$i++)
                                               <td class="containerrow" id="{{$days}}{{$my_time->start}}{{$i}}" >

                                                <input type="hidden" name="department" class="department" value=" {{ $dept}} ">
                                                <input type="hidden" name="section" class="section" value=" {{ $i}} ">
                                                <input type="hidden" name="time" class="time" value=" {{$my_time->start}} ">
                                                <input type="hidden" name="time_id" class="time_id" value=" {{$my_time->id}} ">
                                                <input type="hidden" name="date" class="date" value=" {{$days}} ">
                                                <input type="hidden" name="batch" class="batch" value=" {{$batch}} ">
                                                
                                                   @if(isset($tv[$i]))
                                                       @if(isset($tv[$i][$days][$my_time->id]))
                                                          

                                                            <div class="col-12 text-bold">{{$name::course_title($tv[$i][$days][$my_time->id]->course) }} </div>
                                                            <div class="col-12"> {{$tv[$i][$days][$my_time->id]->name}} </div>
                                                            <div class="col-12"> {{$name::instrealname($tv[$i][$days][$my_time->id]->instructor)}} </div> 
                                                            <div class="col-12"> Term: {{$tv[$i][$days][$my_time->id]->term}} </div> 
                                                          </div>
                                                       @else

                                                       {{--$i--}}  {{--$days--}}  {{--$my_time->id--}}
                                                       @endif
                                                   
                                                      
                                                    @endif
                                           @endfor
                                               </td>
                                       </tr>
                                   @endforeach

                               @endforeach

                           </tbody>
                     </table>
            
               </div>
             @endforeach
                  
            @endif
            </div>

      </div>
   
</div> 


@endsection