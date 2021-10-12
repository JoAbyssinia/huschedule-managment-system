@extends('master.master')
@section('nav','Load Import')
@section('contiener')
 
<div class="col-12 col-sm-12">
            <!-- Default box -->
            <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-building"></i>
                List of Load</h3>
                <div class="card-tools">
                  <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-file-upload"></i> Import </button>
                
                  <a href="{{ route('datawipp') }}" class="btn btn-danger text-white"> 
                  <i class="fa fa-trash-alt"></i> delete all
                  </a>
                  
                </div>
              </div>
              <div class="card-body">

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">List Course assigned </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Instructor’s Name </th> 
                        <th>Modality</th> 
                        <th>Department</th>
                        <th>Batch</th>
                        <th>Section</th>
                        <th>term</th>
                        <th>Course</th>
                      </tr>
                      </thead>

                      <tbody>
                        
                        @if (isset($data))
                        
                            @foreach ($data as $d )
                            <tr>
                              <td>{{ $d->instructor_name }}</td>
                              <td>{{ $d->modality }}  </td>
                              <td> {{ $d->department }} </td>
                              <td> {{ $d->batch }} </td>
                              <td> {{ $d->section }} </td>
                              <td> {{ $d->term }} </td>
                              <td> {{ $d->course_title }} </td>
                            </tr> 
                            @endforeach

                        @endif

                      
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Instructor’s Name </th> 
                          <th>Modality</th> 
                          <th>Department</th>
                          <th>Batch</th>
                          <th>Section</th>
                          <th>term</th>
                          <th>Course</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              
              </div>
         </div>
              <!-- /.card-body -->

              <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Import class Load</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <form action="{{ route('import.loaddata') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleInputFile">File select</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" required name="load" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success"> <i class="fa fa-upload"></i> Import </button>
                    </div>
                  </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
</div>


@endsection
