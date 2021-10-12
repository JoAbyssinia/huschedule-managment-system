@inject('name', 'App\Http\Controllers\realnameController')
@extends('master.master')
@section('nav','Class Schedule')
@section('contiener')

<div class="col-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-calendar-alt"></i> Dashbourd</h3>
               
              </div>
              <div class="card-body">
               <form action="{{url('filter')}}" method="get">
                <div class="row">
                 
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Department</label>
                      <select name="dep" class="form-control select2" style="width: 100%;">

                        @if (isset($dep))

                          @foreach ($dep as $d )
                          <option value="{{ $d->department }}" >{{ $d->department }}</option>       
                          @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Batch</label>
                      <select name="batch" class="form-control select2" style="width: 100%;">
                        <!-- <option selected="selected">All</option> -->
                        
                        @if (isset($batch))

                          @foreach ($batch as $b )
                          <option>{{ $b->batch }}</option>       
                          @endforeach
                        @endif
                    
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Modality</label>
                      <select name="mod" class="form-control select2" style="width: 100%;">
                        <!-- <option selected="selected">All</option> -->
                        <option value="Regular" >Regular</option>
                        <option value="Extension">Extension</option>
                        <option value="Weekend" >Weekend</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group justify-content-center">
                      <label> <small> filter </small> </label>
                      <button class="btn btn-info btn-block"> <i class="fa fa-filter"></i> filter </button>
                    </div>
                  </div>
                 </div>
                </form>
                <hr>
                <div class="row m-3">

                  @if(isset($header))  
                    <div class="col-12">
                     <h3> <i class="fa fa-arrow-alt-circle-right"></i> {{ $header[0]}} - {{ $header[1] }} - {{$header[2] }} </h3>
                    </div>

                  @if(isset($section))
                    @php  
                      $secdivider = sizeof($section); 
                      $secCouter = 1;
                    @endphp
                      @foreach($section as $sec)
                     
                       <div class="col-12" >
                        <h5 class="ml-2"> section <strong>
                        @if($sec['section']=='1')
                        {{'A'}}
                        @elseif($sec['section']=='2')
                        {{ 'B' }}
                        @elseif($sec['section']=='3')
                        {{'C'}}
                        @elseif($sec['section']=='4')
                        {{'D'}}
                        @elseif($sec['section']=='5')
                        {{'E'}}
                        @elseif($sec['section']=='6')
                        {{ 'F' }}
                        @elseif($sec['section']=='7')
                        {{ 'G' }}
                        @elseif($sec['section']=='8')
                        {{ 'H' }}
                        @elseif($sec['section']=='9') 
                        {{ 'I' }}
                        @elseif($sec['section']=='10')
                        {{ 'J' }}
                        @elseif($sec['section']=='11')
                        {{ 'K' }}
                        @elseif($sec['section']=='12')
                        {{ 'L' }}
                        @elseif($sec['section']=='13')
                        {{ 'M' }}
                        @endif
                        </strong></h5>
                      @php 
                        $checker=-1;
                        $couter = 0;
                      @endphp 
                      @if(isset($schedule))
                        @if($schedule==0)
                            <h3><center> No Schedule found </center> </h3>
                        @else
                        <table class="table table-sm table-bordered">
                          <thead>
                            <tr>
                              <th>course title</th>
                              <th>date</th>
                              <th>time table</th>
                              <th>Room</th>
                              <th>instructor</th>
                            </tr>
                          </thead>
                          <tbody>

                            
                          @foreach($schedule as $sch)
                              {{--  back and check again when u see any problem --}}
                              @if($secCouter == $sch['section'])
                              <tr>
                                <td>  {{ $name::course_title($sch['course_id'])}}</td>
                                
                                <td>
                                @if(isset($sch['0']->date))
                                  {{ $name::date($sch['0']->date)  }}
                                @endif
                                </td>

                                <td>
                                @if(isset($sch['0']->time_id))
                                  {{ $name::timeTable($sch['0']->time_id) }}
                                @endif
                                </td>

                                <td>
                                @if(isset($sch['0']->room_id))
                                  {{ $name::room($sch['0']->room_id) }}
                                @endif
                                </td>

                                <td>
                                @if(isset($sch['0']->instructor))
                                  {{$name::instrealname($sch['0']->instructor)}}
                                @endif
                                </td>
                                
                               
                              </tr>
                              @endif
                            
                          @endforeach
                          </tbody>
                        </table>
                        @endif
                    
                     @endif
                    </div>
                  @php 
                    $secCouter++;
                  @endphp  
                  @endforeach
                       
                  @else
                  </div>


                  @endif

                  @else
                    <div class="col-12"> 
                    <center> <i class="fa fa-search"></i> No filter <strong>selected</strong>  </center>
                    </div>
                  @endif

               
                    <!-- <div>
                     <h5 class="ml-2"> section 2 </h5>
                    </div> -->
                   
                    <!-- <table class="table table-sm table-bordered">
                      <thead>
                        <tr>
                          <th>course title</th>
                          <th>date</th>
                          <th>time table</th>
                          <th>Room</th>
                          <th>instructor</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>c++</td>
                          <td>Mon</td>
                          <td>2:00 - 4:00</td>
                          <td>NB-111</td>
                          <td>Alemu</td>
                        </tr>
                        <tr>
                          <td>Java</td>
                          <td>Tue</td>
                          <td>2:00 - 4:00</td>
                          <td>NB-112</td>
                          <td>Dr. tadele</td>
                        </tr>
                        <tr>
                          <td>System analizes</td>
                          <td>Wen</td>
                          <td>8:00 - 12:00</td>
                          <td>NB-112</td>
                          <td>kebede </td>
                        </tr>
                        <tr>
                          <td>Compailer design</td>
                          <td>Fre</td>
                          <td>2:00 - 4:00</td>
                          <td>NB-112</td>
                          <td>frezewid</td>
                        </tr>
                      </tbody>
                    </table> -->
                    
                    
                  </div>                  
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

@endsection
