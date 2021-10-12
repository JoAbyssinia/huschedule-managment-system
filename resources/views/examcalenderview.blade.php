@extends('master.master')
@section('nav','Exam Calendar view')

@section('contiener') 

<div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-calendar-alt"></i> Exam Calendar view</h3>
             
                <div class="card-tools m-0">
                  <!-- <a href="{{url('unassingedclass')}}" class="btn btn-info text-white"> unassigned classes  </a>  -->
                </div>
              </div>
             
              <div class="card-body ">

              <form action="{{url('examviewfilter')}}" method="get">
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
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label> Select Modality</label>
                      <select name="modality" id="modality" class="form-control select2" style="width: 100%;">
                        <option value="select" selected>select modality</option>
                        <option value="1" >Regular</option>
                        <option value="2" >Extention</option>
                        <option value="3" >Weekend</option>
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
                   {{ 'Exam schedule calender view for '}}
                   @if($mod==1)
                    {{ 'Regular' }}
                    @elseif($mod==2)
                    {{ 'Extention' }}
                    @elseif($mod==3)
                    {{ 'Weekend' }}
                    @endif
                    {{ $batch }}
                  @endif 
                 </strong>  </span>
                  <hr>
                <div class="row  justify-content-center  table-responsive"> 
                  @if(isset($tableview))
                  <table class="table table-bordered table-sm  text-center ">
                    <thead class="thead-dark">
                      <tr>
                        <th style="width:5%" >Exam date</th>
                        <th style="width:5%">Exam Time</th>
                        @foreach($dep as $d)
                          <th> {{$d->department }} </th>
                        @endforeach
                      </tr>
                    </thead>
                  <tbody>
                    @foreach($tableview as $date => $time )
                      @php 
                        $proTime = count($time);
                      @endphp
                    
                        @foreach($time as $tm=>$depm )
                        <tr>

                        <td rowspan="{{ $proTime }}" class="align-middle " style="transform: rotate(-90deg); " > {{ $date }} </td>

                        <td  class="align-middle" style="transform: rotate(-90deg);">
                          @if($tm=='mor')
                            Morning
                          @else
                            Afternoon
                          @endif
                        </td>
                        @foreach($dep as $d)
                          <td>
                              @if(isset($tableview[$date][$tm][$d->department]))
                              <span class="text-bold"> {{ $tableview[$date][$tm][$d->department][0]['course'] }} </span>
                                <table class="table table-borderless table-sm">
                                  <tbody>
                                  <thead>
                                    <tr>
                                    <th>Section</th>
                                    <th>Room</th>
                                    </tr>
                                  </thead>
                                    @foreach($tableview[$date][$tm][$d->department] as $sec)
                                      <tr style="border-bottom: 0.5px solid #e2e2e2;">
                                    
                                        <td> {{ $section[$sec['section']] }}</td>
                                        <td>{{$sec['room']}}</td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              @endif
                          </td>
                        @endforeach
                        </tr>
                        @endforeach
                    @endforeach
                  </tbody>
                  </table>
                  @else
                  <div class="text-bold text-lg text-center"> Select report </div>
                  @endif
                </div>                 
              </div>
              </div>
              <!-- /.card-body -->
           </div>
            <!-- /.card -->
          </div>
@endsection