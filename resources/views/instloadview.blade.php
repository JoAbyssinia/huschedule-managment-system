@inject('name', 'App\Http\Controllers\realnameController')
@inject('fetcher', 'App\Http\Controllers\fetchClassController')
@extends('master.master')
@section('nav','Instructor view')
@section('contiener')


          <div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-building"></i> Instructor Load </h3>
             
                <div class="card-tools m-0">
                  <a harf="#" class="btn btn-outline-info "> <i class="fa fa-user m-0"></i> </a> 
                </div>
              </div>
             
              <div class="card-body ">

              <form action="{{url('findinstload')}}" method="get">
                <div class="row justify-content-center">
                 
                  <div class="col-md-5">
                    <div class="form-group">
                      <label> Select Modality</label>
                      <select name="modality" id="filter" class="form-control select2" style="width: 100%;">
                        <option value="select" selected>Select modality</option>
                        <option value="Regular" >Regular</option>
                        <option value="Extension" >Extension</option>
                        <option value="Weekend" >Weekend</option>
                      </select>
                    </div>
                  </div>
               
                  <div class="col-md-2">
                    <div class="form-group justify-content-center">
                      <label> <small>report </small> </label>
                      <button id="reportbtn" class="btn btn-info btn-block"> <i class="fa fa-search"></i> Report </button>
                    </div>
                  </div>
                 </div>
                 <!-- modality -->
                 <div class="row justify-content-center" id="modalityfilter">
                 <!-- js add molality option hire -->
                 </div>
                </form>                     
                <span class="text"> Result : <strong> 
                  @if(isset($search))
                   {{ $mod }}
                   
                  @endif
                 </strong>  </span>
                  <hr>

                <div class="row  justify-content-center">
                  
                  @if(isset($datapass))
                  @php 
                    $color = array('info','orange','success','danger','green');
                  @endphp
                <table class="table table-bordered table-sm table-hover text-nowrap text-center">
                  <thead>
                      <tr >
                        <th style="width: 10px;" >NO</th>
                        <th style="width: 150px;">Instructor Name (N0. course)</th>
                        @if($mod=="Regular" || $mod=="Extension")
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wensday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        @elseif($mod == "Weekend")
                        <th>Saturday</th>
                        <th>Sunday</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                    @php $i=1; $n=0; @endphp
                   
                    @foreach($datapass as $data)
                    <tr>
                        <td> {{ $i }}</td>
                        <td style="text-align: left;" >{{ $name::instrealname($data['inst'])  }}  
                       
                         <strong> ( {{ sizeof($data[0])}} ) </strong> 
                           
                        </td>

                              @php 
                               $v = sizeof($data[0]);
                              @endphp 

                            
                             
                      @if($mod=="Regular" || $mod=="Extension")
                        <!-- Monday -->
                        <td>
                        
                         @if($data[0][$n]->date == 'mo' )

                          @php 
                            $v= sizeof($data[0]);
                            $cindex = 0;
                          @endphp
                          <div class="row">
                          @for($j=0; $j< sizeof($data[0]); $j++ )

                              @if($data[0][$j]->date == 'mo')

                              @php $n++; @endphp

                            <div class="col-3 @if($cindex>3)
                              $cindex=0;

                              @endif bg-{{$color[$cindex]}} badge p-1 m-1 cursor-pointer" >  
                              <ul class="navbar-nav ml-auto">
                                
                                <li class="nav-item dropdown user-menu">
                                <a harf="#" class="nav-link text-white " data-toggle="dropdown" href="#">
                                 
                                  T{{ $data[0][$j]->time_id }} 
                                  </a>
                                  <ul class="mt-2 dropdown-menu">
                                  
                                    <li class="user-body">
                                      <div class="row">
                                        <div class="row">
                                          <div class="col-3">date: </div><div class="col-9">{{$name::date($data[0][$j]->date)}}</div>
                                          <div class="col-3">time: </div><div class="col-9">{{ $name::timeTable($data[0][$j]->time_id)}}</div>
                                          <div class="col-3">dep: </div><div class="col-9">{{$data[0][$j]->department}}</div>
                                          <div class="col-3">Batch: </div><div class="col-9">{{$data[0][$j]->batch}}</div>
                                          <div class="col-3">section: </div><div class="col-9">{{$name::section($data[0][$j]->section)}}</div>
                                          <div class="col-3">term: </div><div class="col-9">{{$data[0][$j]->term}}</div>
                                          <div class="col-3">course: </div><div class="col-9 ">{{$name::course_title($data[0][$j]->course)}}</div>
                                        </div>
                                      </div>
                                      <!-- /.row -->
                                    </li>
                                  </ul>
                                </li>
                          
                              </ul>
                            </div> 
                              @php 
                                $cindex++;
                              @endphp 
                            @endif

                          @endfor
                         </div> 
                         @endif
                        </td> 
                        <!-- thusday -->
                        <td>
                        
                          @if(isset($data[0][$n]->date))
                           @if($data[0][$n]->date == 'tu' )

                            @php 
                              $v= sizeof($data[0]);
                              $cindex=0;
                            @endphp
                            <div class="row">
                            @for($j=0; $j< sizeof($data[0]); $j++ )

                                @if($data[0][$j]->date == 'tu')
                                @php $n++;  @endphp
                               
                              <div class="col-3 
                              @if($cindex>3)
                              $cindex=0;

                              @endif
                              bg-{{$color[$cindex]}} badge p-1 m-1" >  
                                <ul class="navbar-nav ml-auto">
                                  
                                  <li class="nav-item dropdown user-menu">
                                    <a harf="#" class="nav-link text-white " data-toggle="dropdown" href="#">
                                  
                                    T{{$data[0][$j]->time_id  }}
                                    </a>
                                    <ul class="mt-2 dropdown-menu">
                                    
                                      <li class="user-body">
                                        <div class="row">
                                          <div class="row">
                                            <div class="col-3">date: </div><div class="col-9">{{$name::date($data[0][$j]->date)}}</div>
                                            <div class="col-3">time: </div><div class="col-9">{{$name::timeTable($data[0][$j]->time_id)}}</div>
                                            <div class="col-3">dep: </div><div class="col-9">{{$data[0][$j]->department}}</div>
                                            <div class="col-3">Batch: </div><div class="col-9">{{$data[0][$j]->batch}}</div>
                                            <div class="col-3">section: </div><div class="col-9">{{$name::section($data[0][$j]->section)}}</div>
                                            <div class="col-3">term: </div><div class="col-9">{{$data[0][$j]->term}}</div>
                                            <div class="col-3">course: </div><div class="col-9 ">{{$name::course_title($data[0][$j]->course)}}</div>
                                          </div>
                                        </div>
                                        <!-- /.row -->
                                      </li>
                                    </ul>
                                  </li>
                            
                                </ul>
                              </div> 
                              @php 
                                $cindex++;
                              @endphp  
                              @endif
                            @endfor
                          </div> 
                          @endif
                          @endif
                        </td> 
                        <!-- wensday -->
                        <td>
                          @if(isset($data[0][$n]->date))
                           @if($data[0][$n]->date == 'we' )

                            @php 
                              $v= sizeof($data[0]);
                              $cindex=0;
                            @endphp
                            <div class="row">
                            @for($j=0; $j< sizeof($data[0]); $j++ )

                                @if($data[0][$j]->date == 'we')
                                @php $n++; @endphp
                              <div class="col-3 
                              @if($cindex>3)
                              $cindex=0;

                              @endif
                              bg-{{$color[$cindex]}} badge p-1 m-1" >  
                                <ul class="navbar-nav ml-auto">
                                  
                                  <li class="nav-item dropdown user-menu">
                                    <a harf="#" class="nav-link text-white " data-toggle="dropdown" href="#">
                                  
                                    T{{$data[0][$j]->time_id  }}
                                    </a>
                                    <ul class="mt-2 dropdown-menu">
                                    
                                      <li class="user-body">
                                        <div class="row">
                                          <div class="row">
                                            <div class="col-3">date: </div><div class="col-9">{{$name::date($data[0][$j]->date)}}</div>
                                            <div class="col-3">time: </div><div class="col-9">{{ $name::timeTable($data[0][$j]->time_id)}}</div>
                                            <div class="col-3">dep: </div><div class="col-9">{{$data[0][$j]->department}}</div>
                                            <div class="col-3">Batch: </div><div class="col-9">{{$data[0][$j]->batch}}</div>
                                            <div class="col-3">section: </div><div class="col-9">{{$name::section($data[0][$j]->section)}}</div>
                                            <div class="col-3">term: </div><div class="col-9">{{$data[0][$j]->term}}</div>
                                            <div class="col-3">course: </div><div class="col-9 ">{{$name::course_title($data[0][$j]->course)}}</div>
                                          </div>
                                        </div>
                                        <!-- /.row -->
                                      </li>
                                    </ul>
                                  </li>
                            
                                </ul>
                              </div>
                              @php 
                                $cindex++;
                              @endphp   
                              @endif
                            @endfor
                          </div> 
                          @endif
                         @endif
                        </td>
                       <!-- thursday -->
                        <td>
                         @if(isset($data[0][$n]->date))
                          @if($data[0][$n]->date == 'th' )

                            @php 
                              $v= sizeof($data[0]);
                              $cindex=0;
                            @endphp
                            <div class="row">
                            @for($j=0; $j< sizeof($data[0]); $j++ )

                                @if($data[0][$j]->date == 'th')
                                @php $n++; @endphp
                              <div class="col-3 
                              @if($cindex>3)
                              $cindex=0;

                              @endif
                              bg-{{$color[$cindex]}} badge p-1 m-1" >  
                                <ul class="navbar-nav ml-auto">
                                  
                                  <li class="nav-item dropdown user-menu">
                                  <a harf="#" class="nav-link text-white " data-toggle="dropdown" href="#">
                                  
                                    T{{$data[0][$j]->time_id  }}
                                    </a>
                                    <ul class="mt-2 dropdown-menu">
                                    
                                      <li class="user-body">
                                        <div class="row">
                                          <div class="row">
                                            <div class="col-3">date: </div><div class="col-9">{{$name::date($data[0][$j]->date)}}</div>
                                            <div class="col-3">time: </div><div class="col-9">{{ $name::timeTable($data[0][$j]->time_id)}}</div>
                                            <div class="col-3">dep: </div><div class="col-9">{{$data[0][$j]->department}}</div>
                                            <div class="col-3">Batch: </div><div class="col-9">{{$data[0][$j]->batch}}</div>
                                            <div class="col-3">section: </div><div class="col-9">{{$name::section($data[0][$j]->section)}}</div>
                                            <div class="col-3">term: </div><div class="col-9">{{$data[0][$j]->term}}</div>
                                            <div class="col-3">course: </div><div class="col-9 ">{{$name::course_title($data[0][$j]->course)}}</div>
                                          </div>
                                        </div>
                                        <!-- /.row -->
                                      </li>
                                    </ul>
                                  </li>
                            
                                </ul>
                              </div>
                              @php 
                                $cindex++;
                              @endphp   
                              @endif
                            @endfor
                          </div> 
                          @endif
                         @endif
                        </td>
                        <!-- friday -->
                        <td>
                          @if(isset($data[0][$n]->date))
                           @if($data[0][$n]->date == 'fr' )

                            @php 
                              $v= sizeof($data[0]);
                              $cindex=0;
                            @endphp
                            <div class="row">
                            @for($j=0; $j< sizeof($data[0]); $j++ )

                                @if($data[0][$j]->date == 'fr')
                                @php $n++; @endphp
                              <div class="col-3 
                              @if($cindex>3)
                              $cindex=0;

                              @endif
                              bg-{{$color[$cindex]}} badge p-1 m-1" >  
                                <ul class="navbar-nav ml-auto">
                                  
                                  <li class="nav-item dropdown user-menu">
                                    <a harf="#" class="nav-link text-white " data-toggle="dropdown" href="#">
                                  
                                    T{{$data[0][$j]->time_id  }}
                                    </a>
                                    <ul class="mt-2 dropdown-menu">
                                    
                                      <li class="user-body">
                                        <div class="row">
                                          <div class="row">
                                            <div class="col-3">date: </div><div class="col-9">{{$name::date($data[0][$j]->date)}}</div>
                                            <div class="col-3">time: </div><div class="col-9">{{ $name::timeTable($data[0][$j]->time_id)}}</div>
                                            <div class="col-3">dep: </div><div class="col-9">{{$data[0][$j]->department}}</div>
                                            <div class="col-3">Batch: </div><div class="col-9">{{$data[0][$j]->batch}}</div>
                                            <div class="col-3">section: </div><div class="col-9">{{$name::section($data[0][$j]->section)  }}</div>
                                            <div class="col-3">term: </div><div class="col-9">{{$data[0][$j]->term}}</div>
                                            <div class="col-3">course: </div><div class="col-9 ">{{$name::course_title($data[0][$j]->course)}}</div>
                                          </div>
                                        </div>
                                        <!-- /.row -->
                                      </li>
                                    </ul>
                                  </li>
                            
                                </ul>
                              </div>
                              @php 
                                $cindex++;
                              @endphp   
                              @endif
                            @endfor
                          </div> 
                          @endif
                         @endif
                        </td>


                      @elseif($mod == "Weekend")
                           <!-- saturday -->
                      
                      <td>
                       
                        
                        @if($data[0][$n]->date == 'sat' )

                         @php 
                           $v= sizeof($data[0]);
                           $cindex=0;
                         @endphp
                         <div class="row">
                         @for($j=0; $j< sizeof($data[0]); $j++ )

                             @if($data[0][$j]->date == 'sat')

                             @php $n++; @endphp

                           <div class="col-3 
                           @if($cindex>3)
                              $cindex=0;

                              @endif
                           bg-{{$color[$cindex]}} badge p-1 m-1 cursor-pointer" >  
                             <ul class="navbar-nav ml-auto">
                               
                               <li class="nav-item dropdown user-menu">
                               <a harf="#" class="nav-link text-white " data-toggle="dropdown" href="#">
                                
                                 T{{ $data[0][$j]->time_id }}
                                 </a>
                                 <ul class="mt-2 dropdown-menu">
                                 
                                   <li class="user-body">
                                     <div class="row">
                                       <div class="row">
                                         <div class="col-3">date: </div><div class="col-9">{{$name::date($data[0][$j]->date)}}</div>
                                         <div class="col-3">time: </div><div class="col-9">{{ $name::timeTable($data[0][$j]->time_id)}}</div>
                                         <div class="col-3">dep: </div><div class="col-9">{{$data[0][$j]->department}}</div>
                                         <div class="col-3">Batch: </div><div class="col-9">{{$data[0][$j]->batch}}</div>
                                         <div class="col-3">section: </div><div class="col-9">{{$name::section($data[0][$j]->section)}}</div>
                                         <div class="col-3">term: </div><div class="col-9">{{$data[0][$j]->term}}</div>
                                         <div class="col-3">course: </div><div class="col-9 ">{{$name::course_title($data[0][$j]->course)}}</div>
                                       </div>
                                     </div>
                                     <!-- /.row -->
                                   </li>
                                 </ul>
                               </li>
                         
                             </ul>
                           </div>  
                           @php 
                                $cindex++;
                              @endphp 
                           @endif
                         @endfor
                        </div> 
                      @endif
                      </td> 

                     
                       <!-- sunsday -->
                      <td>
                     
                     
                         @if(isset($data[0][$n]->date))
                           @if($data[0][$n]->date == 'sun' )
                           
                           @php 
                             $cindex=0;
                           @endphp
                           <div class="row">
                          
                           @for($j=0; $j< sizeof($data[0]); $j++ )

                               @if($data[0][$j]->date == 'sun')
                              

                              

                             <div class="col-3 
                             @if($cindex>3)
                              $cindex=0;

                              @endif
                             bg-{{$color[$cindex]}} badge p-1 m-1" >  
                               <ul class="navbar-nav ml-auto">
                                 
                                 <li class="nav-item dropdown user-menu">
                                   <a harf="#" class="nav-link text-white " data-toggle="dropdown" href="#">
                                 
                                   T{{$data[0][$j]->time_id  }}
                                   </a>
                                   <ul class="mt-2 dropdown-menu">
                                   
                                     <li class="user-body">
                                       <div class="row">
                                         <div class="row">
                                           <div class="col-3">date: </div><div class="col-9">{{$name::date($data[0][$j]->date)}}</div>
                                           <div class="col-3">time: </div><div class="col-9">{{$name::timeTable($data[0][$j]->time_id)}}</div>
                                           <div class="col-3">dep: </div><div class="col-9">{{$data[0][$j]->department}}</div>
                                           <div class="col-3">Batch: </div><div class="col-9">{{$data[0][$j]->batch}}</div>
                                           <div class="col-3">section: </div><div class="col-9">{{$name::section($data[0][$j]->section)}}</div>
                                           <div class="col-3">term: </div><div class="col-9">{{$data[0][$j]->term}}</div>
                                           <div class="col-3">course: </div><div class="col-9 ">{{$name::course_title($data[0][$j]->course)}}</div>
                                         </div>
                                       </div>
                                       <!-- /.row -->
                                     </li>
                                   </ul>
                                 </li>
                           
                               </ul>
                             </div> 
                             @php 
                                $cindex++;
                              @endphp  
                             @endif
                           @endfor
                          </div> 
                          @endif
                         @endif
                      </td>
                      @endif
                      </tr>
                     
                      @php $i++; $n=0;  @endphp
                    @endforeach
                    </tbody>
                </table>
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