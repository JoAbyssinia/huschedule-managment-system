@extends('master.master')
@section('nav','Exam Schedule')

@section('contiener') 


<div class="col-6 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-school"></i> Exam schedule</h3>
                <div class="card-tools">
                  <button class="btn btn-danger" data-toggle="modal" data-target="#modal-sm"> <i class="fa fa-trash-alt"></i> Clear Exam schedules </button>
                </div>
              </div>
              <form action="{{url('examGenerate')}}" method="GET">
              <div class="card-body ">
                <div class="row">
                  <div class="col-6">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Batch</label>
                      <div class="col-sm-10">
                      <select name="batch[]" id="batch" class="select2" required data-placeholder="select Batch" style="width: 100%;" multiple  >
                          <option value="2010" >2010 entry</option>
                          <option value="2011" >2011 entry</option>
                          <option value="2012" >2012 entry</option>
                          <option value="2013" >2013 entry</option>
                          <option value="2014" >2014 entry</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Modality</label>
                      <div class="col-sm-10">
                        <select name="modality" id="modality" class="form-control select2" style="width: 100%;">
                          <option value="Regular" >Regular</option>
                          <option value="Extention" >Extention</option>
                          <option value="Weekend" >Weekend</option>
                        </select>
                      </div>
                    </div>
                   
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                      <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                           </span>
                        </div>
                        <input type="text" name="date" class="form-control float-right" id="reservation">
                        </div>
                      </div>
                    </div>  
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Time</label>
                      <div class="col-sm-5">
                      <div class="icheck-primary d-inline">
                        <input name="timeMor" class="time"  checked type="checkbox" id="checkboxPrimary1" >
                        <label for="checkboxPrimary1">
                          Morning (2:00 - 4:00)
                        </label>
                      </div>
                      </div>

                      <div class="col-sm-5">
                      <div class="icheck-primary d-inline">
                        <input name="timeAfter" class="time" type="checkbox" id="checkboxPrimary2" >
                        <label for="checkboxPrimary2">
                          Afternoon (8:00 - 10:00)
                        </label>
                      </div>
                      </div>
                    </div>  
                    
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Gradute</label>
                      <div class="col-sm-10">
                        <select name="gradute" class="form-control select2" style="width: 100%;">
                          <option value="under" selected="">Undergradute</option>
                          <option value="post" >Postgradute</option>
                          <option value="level">Level</option>
                        </select>
                      </div>
                    </div>
                   
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
                      <div class="col-sm-10">
                        <select name="type" class="form-control select2" style="width: 100%;">
                          <option value="mid">Mid exam</option>
                          <option value="final" >final exam</option>
                          <option value="other">other</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <button type="submit" class="btn bg-success btn-lg ml-2">Generate</button>
                    </div>
                  </div>  
                  <!-- room customisationn -->
                  <!-- <div class="col-6">
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input name="allroom" type="checkbox" checked class="custom-control-input" id="allrecourse">
                        <label class="custom-control-label" for="allrecourse">Use all available rooms</label>
                      </div>
                    </div> -->
                </form>
                    <!-- <hr> -->
                    <!-- <div class="row">
                    
                        <div class="col-6">
                          <span class="text-bold"> List of selected resourse </span>
                        </div>
                        <div class="col-6">
                        <button type="button" id="add-btn" class="btn btn-default mb-2 float-right " data-toggle="modal" data-target="#modal-default">
                          <i class="fa fa-plus"></i> Add 
                        </button>
                        </div>
                    </div>
                     -->
                    <!-- <div id="selected"> -->
                        <!-- seleceted list of resourse appire hire -->
                    <!-- </div> -->
                   
                  
                     
                      <!-- end of card select result  -->
                  </div>
                </div>
              </div>
              <!-- delete warning  -->
              <div class="modal fade" id="modal-sm">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <small class="modal-title">warining</small>
                      
                    </div>
                    <div class="modal-body text-center">
                        <i class="fa fa-trash-alt text-danger"></i> Delete all schedules 
                    </div>
                      <form action="{{ url('deleteExamSchedules') }}" method="get">
                    <div class="modal-footer justify-content-center">
                      <button type="submit" class="btn btn-danger"> <i class="fa fa-trash-alt"></i> Delete </button>
                    </div>
                      </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>


              

              <!--  custom room  --> 
              <!--  am putting if may requered -->
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"><i class="fa fa-edit"></i> Custom resourse</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="#" method="get" id="customform" name="customform">
                      <div class="modal-body"> 
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select building</label>
                          <select name="building" id="building"  class="form-control select2 " style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="0">select building</option>
                            {{-- @foreach($building as $b)
                            <option value="{{ $b->id }}">{{ ucfirst($b->name) }}</option>
                            @endforeach --}}
                          
                          </select>
                        </div>
                      
                        <div class="form-group">
                        <label for="">Select floor</label>
                          <select name="floor" id="floor" data-placeholder='select floor' multiple="multiple" class="form-control select2" style="width: 100%;" >   
                            <option value="0">select floor</option>
                            
                          </select>
                        </div>
                        

                      <div class="form-group">
                        <label for="">Select rooms</label>
                        <select name="room" id="room" data-required multiple="multiple" data-placeholder='select rooms' class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          
                            
                          </select>
                      </div>

                      
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="spinner-border text-dark" id="loadingsave" hidden role="status"></div>
                        <button type="button" id="save-btn" class="btn btn-success"> 
                          <i class="fa fa-save"></i> Save </button>
                      </div>
                    </form>  
                  </div>
                  <!-- /.modal-content --> 
                
                </div>
               <!-- /. modal-dialog -->
              </div>
              



              </div>
</div>

@endsection