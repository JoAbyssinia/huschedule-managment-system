@extends('master.master')
@section('nav','View room-type')
@section('contiener') 


   <div class="col-12 col-sm-12">
      <!-- Default box -->
      <div class="card card-yellow ">
        <div class="card-header">
          <h3 class="card-title"> <i class="fas fa-building"></i> View building</h3>
        </div>

        <div class="card-body ">
          <div class="row">
            
            <table class="table table-hover table-sm ml-3 text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @if(isset($rt))
                @if(count($rt))
                @php $cout = 1 @endphp
                @foreach ($rt as $roomt)
                  <tr>
                    <td>{{ $cout  }}</td>
                    <td>{{ $roomt->name }}</td>
                    <td>
                      <a href="{{ url('edit_rt/'.$roomt->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('delete_rt/'.$roomt->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                @php $cout++ @endphp
                @endforeach
                @else
                <tr>
                  <td colspan="5"> <center> <i class="fa fa-aye"></i> not saved buildings </center> </td>
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