<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvigilatorController;
use App\Http\Controllers\scheduleController1;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\buildingController;
use App\Http\Controllers\roomtypeController;
use App\Http\Controllers\timetableController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\landingCotroller;
use App\Http\Controllers\reportController;
use App\Http\Controllers\ajaxController;
use App\Http\Controllers\ExamScheduleController;
use App\Http\Controllers\ImportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('schedule');
// });

//dashboard route
Route::get('/',[landingCotroller::class,'index'])->name('/');

// class dashboard routes
Route::get('/class-dashboard',[dashboardController::class,'index'])->name('class-dashboard');
Route::get('/filter',[dashboardController::class,'filter'])->name('filter');

Route::get('/EditCalender/instimechecker/',[ajaxController::class,'instimechecker']); 

// report routes 

Route::get('instload',[reportController::class,'instloadView'])->name('instload');
Route::get('findinstload',[reportController::class,'instload'])->name('findinstload');
Route::get('calenderview',[reportController::class,'index'])->name('calenderview');
Route::get('unassingedclass',[reportController::class,'unassingedclass'])->name('unassingedclass');
Route::get('unassingedview',[reportController::class,'unassingedclassview'])->name('unassingedview');
Route::get('tableview',[reportController::class,'tableview'])->name('tableview');
Route::get('EditCalender/{dep}',[reportController::class,'CalenderEdit'])->name('EditCalender');
Route::get('examcalenderview',[reportController::class,'Examview'])->name('examcalenderview');
Route::get('examviewfilter',[reportController::class,'ExamViewFilter'])->name('examviewfilter');
Route::get('invigilatorload',[reportController::class,'invigLoad'])->name('invigilatorload');
Route::get('invigilatorloadtable',[reportController::class,'invigLoadtable'])->name('invigilatorloadtable');



// bulding routes
Route::get('/add-building',[buildingController::class,'index'])->name('index');
Route::get('/add_building',[buildingController::class,'add_building'])->name('add_building');
Route::get('/edit_building/{id}',[buildingController::class,'edit_building'])->name('edit_building');
Route::get('/edit',[buildingController::class,'edit'])->name('edit');
Route::get('/delete_building/{id}',[buildingController::class,'delete_building'])->name('delete_building');
Route::get('/view-building',[buildingController::class,'view_building'])->name('view-building');

// room type routes
Route::get('add_roomtype',[roomtypeController::class,'index'])->name('roomtype');
Route::get('addrt',[roomtypeController::class,'addrt'])->name('addrt');
Route::get('view-roomtype',[roomtypeController::class,'view_roomtype'])->name('view-roomtype');
Route::get('edit_rt/{id}',[roomtypeController::class,'editrt'])->name('edit_rt');
Route::get('editr',[roomtypeController::class,'edit_room'])->name('editr');
Route::get('delete_rt/{id}',[roomtypeController::class,'delete_roomtype'])->name('delete_rt');

// time table
Route::get('add_timetable',[timetableController::class,'index'])->name('add_timetable');
Route::get('view_timetable',[timetableController::class,'view'])->name('view_timetable');
Route::get('add_time',[timetableController::class,'add'])->name('add_time');
Route::get('edit_time/{id}',[timetableController::class,'edit_timetable'])->name('edit_time');
Route::get('edittime',[timetableController::class,'edittime'])->name('edittime');
Route::get('delete_time/{id}',[timetableController::class,'delete_timetable'])->name('delete_time');

// room
Route::get('add_room',[roomController::class,'index'])->name('room');
Route::get('addroom',[roomController::class,'add'])->name('addroom');
// Route::get('edit_rm',[roomController::class,''])->name('');
Route::get('delete_rm/{id}',[roomController::class,'delete'])->name('');
Route::get('view_rooms',[roomController::class,'view'])->name('view_rooms');


// generate
Route::get('class_schedule',[scheduleController1::class,'index'])->name('class_schedule');
Route::get('addcs',[scheduleController1::class,'schedule01'])->name('addcs');
Route::get('clearschedule',[scheduleController1::class,'clearschedule'])->name('clearschedule');


// ajax oppration 
Route::get('addcustom',[ajaxController::class,'store'])->name('addcustom');
Route::get('getfoor/{id}',[ajaxController::class,'floorfetcher']);
Route::get('getrooms',[ajaxController::class,'roomfetcher']);
Route::get('deletecustom',[ajaxController::class,'wiapdata']);
Route::get('customSelectList',[ajaxController::class,'customSelectList']);
Route::get('addcustomdate',[ajaxController::class,'customdate']);
Route::get('deleteDatecustom',[ajaxController::class,'wipecustomdate']);
Route::get('listoffdates',[ajaxController::class,'listoffdates']);


// exam schedule 
Route::get('exam_schedule',[ExamScheduleController::class,'index'])->name('exam_schedule');
Route::get('examGenerate',[ExamScheduleController::class,'examgenerate'])->name('examGenerate');
Route::get('deleteExamSchedules',[ExamScheduleController::class,'truncet'])->name('deleteExamSchedules');

// imports
Route::get('importload',[ImportController::class,'indexload'])->name('importload');
Route::POST('importloaddata',[ImportController::class,'importLoad'])->name('import.loaddata'); 
Route::get('datawipp',[ImportController::class,'deleteAll'])->name('datawipp');



// Invigilator 
Route::get('invigilator',[InvigilatorController::class,'index'])->name('invigilator');
Route::get('add_invigilator',[InvigilatorController::class,'add_inviglator'])->name('add_invigilator');
Route::get('view_invigilator',[InvigilatorController::class,'view_invigilators'])->name('view_invigilator');
Route::get('delete_Invigilator/{id}',[InvigilatorController::class,'delete_invigilators']);



