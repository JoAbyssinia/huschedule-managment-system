@inject('nounassigned', 'App\Http\Controllers\landingCotroller')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HU | Scheduling </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('dist/img/logo.png') }}" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}"> -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- select 2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
   <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">


 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head> 
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <h2 class="text-bold" >HU | Scheduling System </h2>
      
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown user-menu">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="../../dist/img/default_picture.png" class="user-image" alt="User Image">
          <span class="d-none d-sm-inline">Yohannes Kasse</span>
        </a>
        <ul class="mt-2 dropdown-menu">
          <!-- User image -->
          <li class="user-header bg-danger">
            <img src="../../dist/img/default_picture.png" class="img-circle" alt="User Image">

            <p class="mt-0"> <span class="text-bold">Yohannes kassa</span> <br> 
             
              <span class="text">Program scheduler</span>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              
              <div class="col-12 ">
                <a class="float-right" href="#"><i class="fa fa-sign-out-alt"></i> log-out</a>
              </div> 
            </div>
            <!-- /.row -->
          </li>
        </ul>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
   
      <div class="brand-links text-center m-0 p-0 ">
       <a href="{{route('/')}}">
        <img src="{{ asset('dist/img/logo.png')}}"
           alt="Harambe university Logo"
           class="brand-images  mt-2 mb-1 img-circle elevation-1"/>         
      </a>
      </div>
  

    <!-- Sidbar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-1 mb-1 d-flex">
          <span class="info text-white-50"> Navigation </span>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @php
               $segment = Request::segment(1);
               @endphp

          <li class="nav-item">
            <a href="{{route('/')}}" class="nav-link 
            @if(!$segment || $segment =='filter' || $segment =='class-dashboard' || $segment=='findreport' || $segment=='addcs' ) 
									active
									@endif
            ">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- schedule -->
          <li class="nav-item has-treeview  
          @if($segment=='class_schedule' || $segment=='exam_schedule' || $segment == 'deleteExamSchedules' 
          || $segment == 'examGenerate' ) 
            menu-open
          @else
            menu
					@endif
           ">
            <a href="#" class="nav-link  
            @if($segment=='class_schedule' || $segment=='exam_schedule' || $segment == 'deleteExamSchedules' 
            || $segment == 'examGenerate') 
              active
					  @endif
            ">
              <i class="nav-icon fas fa-calendar-day"></i>
              <p>
               Schedule
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-2">
              <li class="nav-item">
                <a href="{{ url('class_schedule') }}" class="nav-link  
                @if($segment=='class_schedule') 
                active
					      @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Class Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav-sidebar.html" class="nav-link 
                @if($segment=='Lab Schedule') 
                active
					      @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lab Schedule</p>
                </a>
              </li>
             
              
              <li class="nav-item">
                <a href="{{ url('exam_schedule') }}" class="nav-link 
                @if($segment=='exam_schedule' || $segment == 'deleteExamSchedules'  || $segment == 'examGenerate') 
                active
					      @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Schedule</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Imports  --}}

          <li class="nav-item has-treeview  
          @if($segment=='importload' || $segment=='importloaddata' || $segment == 'datawipp' 
          || $segment == 'examGenerate' ) 
            menu-open
          @else
            menu
					@endif
           ">
            <a href="#" class="nav-link  
            @if($segment=='importload' || $segment=='importloaddata' || $segment == 'datawipp' 
            || $segment == 'examGenerate') 
              active
					  @endif
            ">
              <i class="nav-icon fas fa-file-import"></i>
              <p>
               Imports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-2">
              <li class="nav-item">
                <a href="{{ url('importload') }}" class="nav-link  
                @if($segment=='importload' || $segment=='importloaddata' || $segment == 'datawipp') 
                active
					      @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Load imports</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="../layout/top-nav-sidebar.html" class="nav-link 
                @if($segment=='Lab Schedule') 
                active
					      @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Instructors import</p>
                </a>
              </li>
              --}}
              
              {{-- <li class="nav-item">
                <a href="{{ url('exam_schedule') }}" class="nav-link 
                @if($segment=='exam_schedule' || $segment == 'deleteExamSchedules'  || $segment == 'examGenerate') 
                active
					      @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Import</p>
                </a>
              </li> --}}
            </ul>
          </li>

          {{-- end of imports  --}}
          <!-- room -->
          <li class="nav-item has-treeview  
          @if($segment=='add_room' || $segment=='view_rooms') 
            menu-open
          @else
            menu
					@endif">
            <a href="#" class="nav-link  
              @if($segment=='add_room'|| $segment=='view_rooms') 
                active
					    @endif  ">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
               Room
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-2">
              <li class="nav-item">
                <a href="{{route('room') }}" class="nav-link 
                @if($segment=='add_room') 
                  active
					      @endif 
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Room</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('view_rooms')}}" class="nav-link 
                @if($segment=='view_rooms') 
                  active
					      @endif 
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Room</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- room type -->
          <li class="nav-item has-treeview  
              @if($segment=='add_roomtype'|| $segment=='view-roomtype') 
                menu-open
              @else
                menu
					    @endif ">
            <a href="#" class="nav-link 
            @if($segment=='add_roomtype'|| $segment=='view-roomtype') 
                active
					    @endif 
             ">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
               Room type
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-2">
              <li class="nav-item">
                <a href="{{route('roomtype') }}" class="nav-link 
                @if($segment=='add_roomtype') 
                active
					      @endif 
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Room type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('view-roomtype') }}" class="nav-link 
                @if($segment=='view-roomtype') 
                active
					      @endif 
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Room type</p>
                </a>
              </li>
            </ul>
          </li>
      <!-- building  -->
          <li class="nav-item has-treeview 
          @if($segment=='add-building'|| $segment=='view-building') 
                menu-open
              @else
                menu
					    @endif 
          ">
            <a href="#" class="nav-link 
            @if($segment=='add-building'|| $segment=='view-building') 
                active
					    @endif 
             ">
              <i class="nav-icon fas fa-building"></i>
              <p>
               Building
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-2">
              <li class="nav-item">
                <a href="{{route('index')}}" class="nav-link 
                @if($segment=='add-building') 
                active
					      @endif 
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Building</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('view-building') }}" class="nav-link 
                @if($segment=='view-building') 
                active
					      @endif 
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Building</p>
                </a>
              </li>
            </ul>
          </li>

           <!-- Invigilator  -->
           <li class="nav-item has-treeview 
          @if($segment=='invigilator'|| $segment=='view_invigilator' || $segment=='delete_Invigilator' ) 
                menu-open
              @else
                menu
					    @endif 
          ">
            <a href="#" class="nav-link 
            @if($segment=='invigilator'|| $segment=='view_invigilator'  || $segment=='delete_Invigilator') 
                active
					    @endif 
             ">
              <i class="nav-icon fas fa-users"></i>
              <p>
              Invigilator
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-2">
              <li class="nav-item">
                <a href="{{route('invigilator')}}" class="nav-link 
                @if($segment=='invigilator') 
                active
					      @endif 
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Invigilator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('view_invigilator') }}" class="nav-link 
                @if($segment=='view_invigilator' || $segment=='delete_Invigilator') 
                active
					      @endif 
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Invigilator</p>
                </a>
              </li>
            </ul>
          </li>



   <!-- time table -->
          <li class="nav-item has-treeview 
          @if($segment=='add_timetable'|| $segment=='view_timetable') 
                menu-open
              @else
                menu
					    @endif
          ">
            <a href="#" class="nav-link 
            @if($segment=='add_timetable'|| $segment=='view_timetable') 
                active
              
					    @endif
             ">
              <i class="nav-icon fas fa-clock"></i>
              <p>
               Time table
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-2">
              <li class="nav-item">
                <a href="{{route('add_timetable')}}" class="nav-link  
                @if($segment=='add_timetable') 
                active
					      @endif
                 ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Time</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('view_timetable') }}" class="nav-link
                @if($segment=='view_timetable') 
                active
					      @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Time</p>
                </a>
              </li>
            </ul>
          </li>

     

          <!-- report -->

          <li class="nav-item has-treeview 
          @if($segment=='calenderview' || $segment=='tableview' || $segment=='instload' || $segment=='findinstload'  || $segment=='unassingedclass' || $segment=='unassingedview'  || $segment=='EditCalender' || $segment=='examcalenderview' || $segment=='examviewfilter' || $segment=='invigilatorload' || $segment=='invigilatorloadtable') 
                menu-open
              @else
                menu
					    @endif
          ">
            <a href="#" class="nav-link 
            @if($segment=='calenderview'|| $segment=='tableview'  || $segment=='instload'  || $segment=='findinstload' || $segment=='unassingedclass' || $segment=='unassingedview' || $segment=='EditCalender' || $segment=='examcalenderview' || $segment=='examviewfilter' || $segment=='invigilatorload' || $segment=='invigilatorloadtable') 
                active
              
					    @endif
             ">
             <i class="nav-icon fas fa-print"></i>
              <p>
               Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-2">
              <li class="nav-item">
                <a href="{{route('calenderview')}}" class="nav-link  
                @if($segment=='calenderview' || $segment=='tableview' ) 
                active
					      @endif
                 ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Class Calender view</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('unassingedclass')}}" class="nav-link  
                @if($segment=='unassingedclass' || $segment=='unassignedclassview' || $segment=='unassingedview' || $segment=='EditCalender' ) 
                active
					      @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unassigned class
                  <span class="badge badge-danger right">{{$nounassigned::nounassigned() }}</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('instload') }}" class="nav-link
                @if($segment=='instload'  || $segment=='findinstload') 
                active
					      @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Instractor Class load</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('examcalenderview') }}" class="nav-link
                @if($segment=='examcalenderview'  || $segment=='examviewfilter' ) 
                active
					      @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Calender view</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('invigilatorload') }}" class="nav-link
                @if($segment=='invigilatorload'  || $segment=='invigilatorloadtable') 
                active
					      @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invigilators Class load</p>
                </a>
              </li>

            </ul>
          </li>

            

          <!--options  -->
          <li class="nav-item has-treeview
          @if($segment=='null' || $segment=='null' || $segment=='null' || $segment=='null'  || $segment=='null' || $segment=='null'  || $segment=='null') 
                menu-open
              @else
                menu
					    @endif
          " style="margin-bottom: 10em;">
            <a href="#" class="nav-link 
            @if($segment=='null'|| $segment=='null'  || $segment=='null'  || $segment=='null' || $segment=='null' || $segment=='null' || $segment=='null') 
                active

					    @endif
             ">
             <i class="nav-icon fas fa-cog"></i>
              <p>
              Options
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-2">
              
              <li class="nav-item mb-5">
                <a href="{{route('unassingedclass')}}" class="nav-link  
                @if($segment=='null' || $segment=='null' || $segment=='null' || $segment=='null' ) 
                active
					      @endif
                 ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>class per a day </p>
                 
                </a>
              </li>
              
          </li>



        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- navigation -->
    <div class="row m-0 p-0">
      <div class="col-12">
        <ol class="breadcrumb mr-3 ml-0 mb-0 bg-transparent p-0 float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
          <li class="breadcrumb-item active">@yield('nav')</li>
        </ol>
      </div>
    </div>
    <!-- Main content -->
    <section class="content mt-3">
    <!-- toaster input  -->
    
      <input type="hidden" name="toastkey" value="
      @if(isset($key))
        {{ $key }}
      @endif
      " id="toastkey" >
      <input type="hidden" name="toastmsg" value="
      @if(isset($msg))
        {{ $msg }}
      @endif
      " id="toastmsg" >

      <div class="container-fluid ">
        <div class="row">
        @yield('contiener')
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="http://www.hawisoftware.com.et">Hawi software solution</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- select 2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<!-- date range picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- schedule custome -->
<script src="{{asset('dist/js/schedulecustome.js')}}"></script>
<!-- report custom -->
<script src="{{asset('dist/js/reportcostom.js')}}"></script>
<!-- edit calender control  -->
<script src="{{asset('dist/js/editcalender.js')}}"></script>
<!-- exam schedule -->
<script src="{{ asset('dist/js/examschehule.js') }}"></script>
<!-- jquery ui minified  -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<!-- custom jquery ui  -->
<script src="{{ asset('dist/js/calenderedit.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  </script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    // toastr

    var toastky = $('#toastkey').val();
    var toastMsg = $('#toastmsg').val();
    console.log(toastky);

      if (toastky==1) {
        toastr.success( toastMsg +', Opration successfull');
      }else if(toastky==-1){
        toastr.error(toastMsg+', Opration faild');
      }
     
   
    //Date range picker
    $('#reservation').daterangepicker({
        format: 'YYYY/MM/DD',
        dateLimit: { days: 20 },
        locale: {
            "format": "MM/DD/YYYY",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Su",
                "Mo",
                "Tu",
                "We",
                "Th",
                "Fr",
                "Sa"
            ],
            "monthNames": [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ],
            "firstDay": 1
        },
    },
    function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });
    // $('#reservation').daterangepicker();

      //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    var cr = $('#cr').val();
    var lib = $('#lib').val();
    var lab = $('#lab').val();
    var ofc = $('#ofc').val();

    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Class Room', 
          'Library Room',
          'Labratory Room', 
          'Office Room',
      ],
      datasets: [
        {
          data: [cr,lib,lab,ofc],
          backgroundColor : ['#dc3545', '#007bff', '#28a745','#ffc107'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    });


    // regular 
    var Rocc = $('#Rocc').val();
    var Rrim = $('#Rrim').val();

    var donutChartCanvas = $('#donutChartR').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Regular occupied', 
          'unoccupied',
      ],
      datasets: [
        {
          data: [Rocc,Rrim],
          backgroundColor : ['#dc3545', '#a0a0a0'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    });


    // extention 
    var Eocc = $('#Eocc').val();
    var Erim = $('#Erim').val();

    var donutChartCanvas = $('#donutChartE').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Extention occupied', 
          'unoccupied',
      ],
      datasets: [
        {
          data: [Eocc,Erim],
          backgroundColor : ['#17a2b8', '#a0a0a0'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    });


    // weekend 
    var Wocc = $('#Wocc').val();
    var Wrim = $('#Wrim').val();

    var donutChartCanvas = $('#donutChartW').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Weekend occupied', 
          'unoccupied',
      ],
      datasets: [
        {
          data: [Wocc,Wrim],
          backgroundColor : ['#28a745', '#a0a0a0'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    });

    
  })
</script>
<script>
 $('#offic').hide();
  
   var head ='<label>Office name </label>';
     head += '<select name="office_name" class="form-control select2" style="width: 100%;">'; 
     
    var bot ="</select>";

  $('#roomt').change(function() {
   
    var selectedOptionVal = $('#roomt').find(":selected").val();
    console.log(selectedOptionVal.trim());
    if ( selectedOptionVal.trim()=='cr' ) {
      $('#offic').slideUp("fast");
      console.log("am hire");
    }else if( selectedOptionVal.trim()=='of' ){
      var off = "";
      off +='<option value="do"> Department Office </option>';
      off +='<option value="ro"> Registration Office </option>';
      off +='<option value="foh"> Faculty of Health </option>';
      off +='<option value="dcs"> Department of Computer Science </option>';
      off +='<option value="po"> Postgraduate Office </option>';
      off +='<option value="dp"> Department of Accounting </option>';
      off +='<option value="stf"> Staff </option>';
      off +='<option value="col"> Center of Online Learning </option>';
      off +='<option value="dc"> Data Center </option>';

      var dis = head+off+bot;
      $('#offic').html(dis);
       $('#offic').slideDown("fast");
    }else if(selectedOptionVal.trim()=='la'){
      var la= "";
      la +='<option value="cl">Computer Labratory </option>';
      la +='<option value="pl">Pharmacy Labratory </option>';
      la +='<option value="nl">Nursing Labratory </option>';
      la +='<option value="ndr">Nursing Demonstraion Room </option>';
      var dist = head+la+bot;
      $('#offic').html(dist); 
      $('#offic').slideDown("fast");
      console.log('labratory');  
    }else if(selectedOptionVal.trim()=='li'){
      var li = "";
      li +='<option value="dl">Digital Library </option>';
      li +='<option value="ugl">Under graduter Library </option>';
      li +='<option value="ugl">Post graduter Library </option>';
      var distc = head+li+bot;
      $('#offic').html(distc);
      $('#offic').slideDown("fast");
      console.log('library')  
    }
  });

</script>

</body>
</html>
