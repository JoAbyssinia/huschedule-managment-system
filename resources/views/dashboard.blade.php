@inject('occupied', 'App\Http\Controllers\occupiedController')
@extends('master.master')
@section('contiener')

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Class</h3>

                <p>Schedule</p>
              </div>
              <div class="icon">
                <i class="fas fa-warehouse"></i>
              </div>
              <a href="{{ url('class-dashboard') }}" class="small-box-footer">go to <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Lab </h3>

                <p>Schedule</p>
              </div>
              <div class="icon">
                <i class="fas fa-warehouse"></i>
              </div>
              <a href="#" class="small-box-footer">go to <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Exam</h3>

                <p>Schedule</p>
              </div>
              <div class="icon">
                <i class="fas fa-warehouse"></i>
              </div>
              <a href="{{url('examcalenderview')}}" class="small-box-footer">go to <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Report</h3>

                <p> print or export </p>
              </div>
              <div class="icon">
                <i class="fas fa-print"></i>
              </div>
              <a href="{{ url('calenderview') }}" class="small-box-footer">go to <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

         <div class="col-12">
          <div class="card card-yellow">
            <div class="card-header">
            <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Resource status </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <i class="fa fa-building"></i> Resourse
                    </div>
                    <div class="card-body">
                         <div class="row">
                          <div class="col-7 d-flex align-items-center"> <h3><strong>Total Rooms</strong> </h3> </div>
                          <div class="col-3 badge badge-info  p-1  m-1"> <h3>  {{$total}} </h3></div>

                            <input type="hidden" name="cr" id="cr" value="{{ $cr }}" >
                            <input type="hidden" name="lib" id="lib" value="{{ $lib }}" >
                            <input type="hidden" name="lab" id="lab" value=" {{ $lab }} " >
                            <input type="hidden" name="ofc" id="ofc" value="{{ $off }}" >

                          
                         </div>
                         <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                          </canvas>
                    </div>
                   
                  </div>
                </div>
                <div class="col-lg-6">
                 <div class="card">
                    <div class="card-header">
                      <i class="fa fa-store-alt"></i> Class occupied
                    </div>
                    <div class="card-body">
                        <div class="row ">
                      
                       
                          <div class="col-12 justify-content-center">
                          <!-- data set --> 
                            <input type="hidden" name="Rocc" id="Rocc" value="{{  $occupied::regular()['occ'] }}" >
                            <input type="hidden" name="Rrim" id="Rrim" value="{{  $occupied::regular()['rem'] }}" >
                            
                          <canvas id="donutChartR" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;">
                          </canvas>
                          </div>
                          <div class="col-6">
                          <!-- data set -->
                          <input type="hidden" name="Eocc" id="Eocc" value="{{  $occupied::extention()['occ'] }}" >
                          <input type="hidden" name="Erim" id="Erim" value="{{  $occupied::extention()['rem'] }}" >

                          <canvas id="donutChartE" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;">
                          </canvas>
                          </div>
                          <div class="col-6">
                          <!-- data set -->
                           <input type="hidden" name="Rocc" id="Wocc" value="{{  $occupied::weekend()['occ'] }}" >
                            <input type="hidden" name="Rrim" id="Wrim" value="{{  $occupied::weekend()['rem'] }}" >
                          
                          <canvas id="donutChartW" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;">
                          </canvas>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-lg-4">
                 <div class="card">
                    <div class="card-header">
                      <i class="fa fa-building"></i> anthor
                    </div>
                    <div class="card-body">
                      
                    </div>
                  </div>
                </div> -->
              </div>
                <!-- footer navigation -->
                <hr>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="float-right">  
                      <a href="">go to all resource <i class="fa fa-arrow-circle-right"></i> </a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
         </div>



@endsection