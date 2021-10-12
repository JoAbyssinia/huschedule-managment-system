@extends('master.master')
@section('nav','View Building')
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
                  <th>NO</th>
                  <th>Name</th>
                  <th>Ownership type </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> 
              @if(isset($listBuilding))
                @if(count($listBuilding))
                @php $cout = 1 @endphp
                @foreach ($listBuilding as $build)
                  <tr>
                    <td>{{ $cout  }}</td>
                    <td>{{ $build->name }}</td>
                    <td>{{ $build->type }}</td>
                    <td>
                      <a href="{{ url('edit_building/'.$build->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('delete_building/'.$build->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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