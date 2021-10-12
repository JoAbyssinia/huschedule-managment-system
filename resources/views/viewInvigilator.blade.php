@extends('master.master')
@section('nav','View Invigilators')
@section('contiener') 

    <div class="col-12 col-sm-12">
      <!-- Default box -->
      <div class="card card-yellow ">
        <div class="card-header">
          <h3 class="card-title"> <i class="fas fa-Invigilator"></i> View Invigilators</h3>
            <div class="card-tools">
               <a href="#" class="btn btn-info"> <i class="fa fa-sync"></i> import instructors</a>
            </div>

         </div>
        
        <div class="card-body ">
          <div class="row">
            
            <table class="table table-hover table-sm ml-3 text-nowrap">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>First name</th>
                  <th>Last name </th>
                  <th>Role </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> 
              @if(isset($listInvigilator))
                @if(count($listInvigilator))
                @php $cout = 1 @endphp
                @foreach ($listInvigilator as $invValues)
                  <tr>
                    <td>{{ $cout  }}</td>
                    <td>{{ ucfirst($invValues->fname) }}</td>
                    <td>{{ ucfirst($invValues->lname) }}</td>
                    <td>{{ $invValues->role }}</td>
                    <td>
                      <a href="{{ url('edit_Invigilator/'.$invValues->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('delete_Invigilator/'.$invValues->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                @php $cout++ @endphp
                @endforeach
                @else
                <tr>
                  <td colspan="5"> <center> <i class="fa fa-aye"></i> not saved Invigilators <br> 
                  <a href="{{ url('invigilator') }}" class="btn btn-info"><i class="fa fa-plus"></i> Add  </a>
               </center> </td>
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