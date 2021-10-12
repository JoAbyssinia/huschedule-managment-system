@inject('name', 'App\Http\Controllers\realnameController')
@inject('fetcher', 'App\Http\Controllers\fetchClassController')
@inject('offDate', 'App\Http\Controllers\OffDayStorageController')
@extends('master.master')
@section('nav','Calendar view')
@section('contiener')


          <div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-calendar-alt"></i> Calendar view</h3>
             
                <div class="card-tools m-0">
                  <a href="{{url('unassingedclass')}}" class="btn btn-info text-white"> unassigned classes  </a> 
                </div>
              </div>
             
              <div class="card-body ">

              <form action="{{url('tableview')}}" method="get">
                <div class="row justify-content-center">
                 
                  <div class="col-md-3">
                    <div class="form-group">
                      <label> Select batch</label>
                      <select name="batch" id="filter" class="form-control select2" style="width: 100%;">
                        <option value="select" selected>select batch</option>
                        <option value="2010" >2010</option>
                        <option value="2011" >2011</option>
                        <option value="2012" >2012</option>
                        <option value="2013"> 2013 </option>
                        <option value="2014"> 2014 </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label> Select Modality</label>
                      <select name="modality" id="modality" class="form-control select2" style="width: 100%;">
                        <option value="select" selected>select modality</option>
                        <option value="Regular" >Regular</option>
                        <option value="Extension" >Extension</option>
                        <option value="Weekend" >Weekend</option>
                      </select>
                    </div>
                  </div>
               
                  <div class="col-md-2">
                    <div class="form-group justify-content-center">
                      <label> <small>report </small> </label>
                      <button id="reportbtn" class="btn btn-info btn-block"> <i class="fa fa-search"></i> Fetch </button>
                    </div>
                  </div>
                 </div>
                 <!-- modality -->
                 <div class="row justify-content-center" id="modalityfilter">
                 <!-- js add molality option hire -->
                 </div>
                </form>                     
                <span class="text"> Result : <strong> 

                  @if(isset($tableview))
                   {{ 'Class schedule calender view for '}}
                  
                    {{ $mod }}
                    
                  @endif
                
                 
                 </strong>  </span>
                  <hr>

                <div class="row  justify-content-center">
                  @php 
                    $color = array('info','orange','success','danger','green');
                  @endphp
               
                  @if(isset($tableview))
             
                    @foreach($tableview as $dept=>$tv)
                   
                            <div class="card col-12 p-1 table-responsive">
                                <table class="table table-bordered table-sm  text-center table-cell-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        @php
                                            $d= count($tableview[$dept]);
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
                                                  style="transform: rotate(-90deg);">
                                                {{ $name::date($days)}}
                                                  </th>
                                                    @php
                                                        $check=1;
                                                    @endphp
                                                @endif
                                                <td class="align-middle" >{{$my_time->start}}-{{$my_time->end}}</td>
                                                 @for($i=1;$i<=$d;$i++)
                                                 @php 
                                                    $ofdChecker = $offDate::offdateChacker($batch,$dept,$days)
                                                  @endphp
                                                    <td class=' 
                                                      @if($ofdChecker)
                                                        bg-secondary
                                                      @endif 
                                                     '>
                                                        @if(isset($tv[$i]))
                                                            @if(isset($tv[$i][$days][$my_time->id]))
                                                                <b>{{ $name::course_title($tv[$i][$days][$my_time->id]->course) }}</b><br>
                                                                {{$tv[$i][$days][$my_time->id]->name}}<br>
                                                                {{ $name::instrealname($tv[$i][$days][$my_time->id]->instructor) }} <br>
                                                                term: {{ $tv[$i][$days][$my_time->id]->term }}
                                                            
                                                            @endif
                                                        
                                                         @endif
                                                @endfor
                                                    </td>
                                            </tr>
                                        @endforeach

                                    @endforeach

                                </tbody>
                          </table>
                               
                      <div class="row mr-1">
                        <div class="col-lg-12 ">
                          <div class="float-right">  
                            <a href="{{ url('EditCalender/'.$dept.','.$mod.','.$batch) }}"> <button class="btn bg-gradient-info ">Edit <i class="fa fa-edit"></i> </button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                 
                  @else
                  <div class="text-bold text-lg"> Select report </div>
                  @endif
              
                </div>                 
              </div>
             
              </div>
              <!-- /.card-body -->
           </div>
            <!-- /.card -->
          </div>

@endsection