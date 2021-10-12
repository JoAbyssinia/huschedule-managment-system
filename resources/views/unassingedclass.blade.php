@inject('name', 'App\Http\Controllers\realnameController')
@inject('fetcher', 'App\Http\Controllers\fetchClassController')
@extends('master.master')
@section('nav','Unassigned classes')
@section('contiener')


          <div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-building"></i> Unassigned classes Report</h3>
             
              </div>
             
              <div class="card-body ">

              <form action="{{url('unassingedview')}}" method="get">
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

                  @if(isset($unassignedclassdata))
                   {{ 'Unassigned class view for '}}
                   @if(isset($mod))
                    {{$mod}}
                    @endif
                    {{ $batch }}
                  @endif
                
                 
                 </strong>  </span>
                  <hr>

                <div class="row  justify-content-center">
                  @if(isset($unassignedclassdata))
                
                 
                   <!-- card start -->
                   <div class="card col-12 p-1">
                  <table class="table table-bordered table-hover table-sm  text-center">
                    <thead>
                      
                      <tr> 
                        <th>Batch</th>
                        <th>Department</th>
                        <th>Modality</th>
                        <th>No. unassigned</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($unassignedclassdata as $tv) 
                     <tr>
                        <td>{{$tv->batch}}</td>
                        <td>{{$tv->department}}</td>
                        <td>
                           {{$tv->modality}}
                        </td>
                        <td>{{$tv->no}}</td>
                        <td>
                        <a href="{{ url('EditCalender/'.$tv->department.','.$tv->modality.','.$tv->batch) }}"  class="btn btn-success "><i class="fa fa-edit"></i> assign </a>
                        </td>
                     </tr>
                     @endforeach  
                   </tbody>
                  </table>
                  </div>
                 
                 
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