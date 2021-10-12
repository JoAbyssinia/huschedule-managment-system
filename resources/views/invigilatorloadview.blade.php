@inject('name', 'App\Http\Controllers\realnameController')
@inject('fetcher', 'App\Http\Controllers\fetchClassController')
@extends('master.master')
@section('nav','Invigilator load view')
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

              <form action="{{url('invigilatorloadtable')}}" method="get">
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
                        <option value="Extention" >Extention</option>
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
                   {{ 'Exam Invigilators Load for '}}
                      {{ $mod }}
                    @endif
                    {{ $batch }}
                  @endif 
                 </strong>  </span>

                   
                    
                   

                  <hr>
                <div class="row  justify-content-center  table-responsive"> 
                  @if(isset($tableview))
                     <table class="table table-bordered table-sm  text-center">
                       
                     <thead class="thead-dark">
                      <tr>
                        <th style="width:5%" >Dep. </th>
                        <th style="width:5%">Section</th>
                        <th style="width:5%">Exam Room</th>
                        @foreach($date as $d)
                         <th> {{ $d->date }} </th>
                        @endforeach
                      </tr>
                    </thead>
                     <tbody>
                     @foreach($tableview as $dep => $sec )
                      @php 
                        $sectionCount = count($sec);
                      @endphp
                  
                      @php
                      $check=0;
                      @endphp
                  
                        @foreach($sec as $s=>$room )
                          <tr>
                          @if($check==0) 
                          <td  rowspan="{{ $sectionCount }}" class="align-middle "> {{ $dep }} </td>
                            @php
                                $check=1;
                            @endphp
                        @endif
                          <td  class="align-middle" >
                         
                            {{ $section[$s] }}
                          </td>
                            @php
                                $counter=0
                            @endphp
                            @foreach($room as $rm=>$invD)
                              <td  class="align-middle" >
                                {{ $rm }}
                              </td>
                              @foreach($date as $d)
                                <td> 
                                  @if(isset($tableview[$dep][$s][$rm][$counter]['date']))
                                    @if($tableview[$dep][$s][$rm][$counter]['date']==$d->date)
                                    {{$tableview[$dep][$s][$rm][$counter]['invig']}} <br>
                                  <strong>{{$tableview[$dep][$s][$rm][$counter]['course']}}</strong>  
                                    @endif
                                  @endif
                                  </td>
                                  @php
                                      $counter++
                                  @endphp
                              @endforeach

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