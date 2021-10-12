@extends('master.master')
@section('nav','View time-table')
@section('contiener') 

<div class="col-12 col-sm-12">
      <!-- Default box -->
      <div class="card card-yellow ">
        <div class="card-header">
          <h3 class="card-title"> <i class="fas fa-building"></i> View time-table</h3>
        </div>
        
        <div class="card-body ">
          <div class="row">
            
            <table class="table table-hover table-sm ml-3 text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Label</th>
                  <th>Start time </th>
                  <th>End time</th>
                  <th>Modality</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
            
              @if(isset($tlist)) 
                @if(count($tlist))
                @php $cout = 1 @endphp
                @foreach ($tlist as $time)
                  <tr>
                  
                    <td>{{ $cout  }}</td>
                    <td>{{ $time->name }}</td>
                    <td>{{ $time->start }}</td>
                    <td>{{ $time->end }}</td>
                    <td> 
                       @if($time->modality==1)
                          Regular
                        @elseif($time->modality==2)
                          Extention 
                        @elseif($time->modality==3)
                          Weekend
                       @endif
                     </td>
                    <td>
                      <a href="{{ url('edit_time/'.$time->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('delete_time/'.$time->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                @php $cout++ @endphp
                @endforeach
                @else
                <tr>
                  <td colspan="5"> <center> <i class="fa fa-aye"></i> Not saved buildings </center> </td>
                </tr>
                @endif
              @endif
              </tbody>
            </table>

        
          </div>                 
        </div>
        
        </div>
        <!-- /.card-body -->
    </div>

@endsection