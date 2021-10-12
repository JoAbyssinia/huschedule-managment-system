@extends('master.master')
@section('nav','Class Schedule')

@section('contiener') 

<div class="col-6 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-school"></i> Class schedule</h3>
                <div class="card-tools">
                  <button class="btn btn-danger" data-toggle="modal" data-target="#modal-sm"> <i class="fa fa-trash-alt"></i> Clear Class Schedules </button>
                </div>
              </div>
              <form action="{{url('addcs')}}" method="GET">
              <div class="card-body ">
                <div class="row">
                  <div class="col-6">
                  <div class="form-group row">
                      <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                      <div class="col-sm-10">
                        <select name="batch" id="batch" class="form-control select2" style="width: 100%;">
                          
                          @if (isset($batch))
                          @foreach ($batch as $b )
                          <option>{{ $b->batch }}</option>       
                          @endforeach
                        @endif
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Modality</label>
                      <div class="col-sm-10">
                        <select name="modality" id="modalitiy" class="form-control select2" style="width: 100%;">
                          <option value="Regular" >Regular</option>
                          <option value="Extension" >Extension</option>
                          <option value="Weekend" >Weekend</option>
                        </select>
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
                    <hr>
                   
                    <div class="form-group row justify-content-between "> 
                   
                      <button type="button" class="btn btn-default btn-sm" name="addfd" id="addfd" data-toggle="modal" data-target="#modal-lg">
                        <i class="fa fa-plus"></i> Add 
                      </button>
                      <span class="text-sm text-black-50 mr-2 "> add off-days for departments </span>
                    </div>
                      <div id="offrow">
                         
                      </div>
                      

                      <!-- @if(isset($sc))
                      @if($sc!=0)
                        {{'disabled '}}
                      @else
                      @endif
                      @endif -->


                      <div class="form-group row">
                        <!-- <span class="text-danger ml-2">schedule is gengerate of this section and modality </span> -->
                      </div>
                   
                    <div class="form-group row">
                      <button type="submit" 
                      
                      
                      class="btn bg-success btn-lg ml-2">Generate</button>
                    </div>
                  </div>  
                  <!-- room customisationn -->
                  <div class="col-6">
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input name="allroom" type="checkbox" checked class="custom-control-input" id="allrecourse">
                        <label class="custom-control-label" for="allrecourse">Use all available rooms</label>
                      </div>
                    </div>
                </form>
                    <hr>
                    <div class="row">
                    
                        <div class="col-6">
                          <span class="text-bold"> List of selected resourse </span>
                        </div>
                        <div class="col-6">
                        <button type="button" id="add-btn" class="btn btn-default mb-2 float-right " data-toggle="modal" data-target="#modal-default">
                          <i class="fa fa-plus"></i> Add 
                        </button>
                        </div>
                    </div>
                    
                    <div id="selected">
                        <!-- seleceted list of resourse appire hire -->
                    </div>
                   
                  
                     
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
                    <div class="modal-body">
                        <i class="fa fa-trash-alt text-danger"></i> Delete all schedules 
                    </div>
                      <form action="{{url('clearschedule')}}" method="get">
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
                            @foreach($building as $b)
                            <option value="{{ $b->id }}">{{ ucfirst($b->name) }}</option>
                            @endforeach
                          
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
              

                <!-- custom date -->
                    
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Custom Date</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="#" method="get" name="customdatefrom" id="customdatefrom">
            <div class="modal-body row">
              <div class="col-6">
                <div class="card">
                  <div class="card-title m-1">
                    group one
                  </div>
                  <div class="card-body">
                    <label for="text-bold">select department</label>
                    <select name="dep1[]" id="dep1" class="select2" data-placeholder="select department" style="width: 100%;" multiple  >
                    <option value="acc" >Accounting</option>
                        <option value="badm" >Business Administration</option>
                        <option value="eco" >Economics</option>
                        <option value="pha" >Pharmacy </option>
                        <option value="mgn" >Management </option>
                        <option value="nrs" >Nursing </option>
                        <option value="ho" >Health officer</option>
                        <option value="mrk">Marketing</option>
                        <option value="cs">Computer science</option>
                        <option value="mis">Mangement of infrotmation sysetem</option>
                    </select>

                    <label for="text-bold m-1">select Date</label>
                    <select name="date1[]" id="date1" class="select2" data-placeholder="select dates" style="width: 100%;" multiple >
                     
                    </select>
                  </div>
                </div>
              </div>


              <!-- group two -->
              <div class="col-6">
                <div class="card">
                  <div class="card-title m-1">
                    group two
                  </div>
                  <div class="card-body">
                    <label for="text-bold">select department</label>
                    <select name="dep2[]" id="dep2" class="select2" data-placeholder="select department" style="width: 100%;" multiple  >
                       <option value="acc" >Accounting</option>
                        <option value="badm" >Business Administration</option>
                        <option value="eco" >Economics</option>
                        <option value="pha" >Pharmacy </option>
                        <option value="mgn" >Management </option>
                        <option value="nrs" >Nursing </option>
                        <option value="ho" >Health officer</option>
                        <option value="mrk">Marketing</option>
                        <option value="cs">Computer science</option>
                        <option value="mis">Mangement of infrotmation sysetem</option>
                    </select>

                    <label for="text-bold m-1">select Date</label>
                    <select name="date2[]" id="date2" class="select2" data-placeholder="select dates" style="width: 100%;" multiple  id="">
                     
                    </select>
                  </div>
                </div>
              </div>
            </div>
            </form> 
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <div class="spinner-border text-dark" id="loadingsaveofd" hidden role="status"></div>
              <button type="button" id="savebtnoffdate" class="btn btn-success"> <i class="fa fa-save"></i> Save </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

                <!-- end fo custom date -->


              </div>
</div>


         
@endsection