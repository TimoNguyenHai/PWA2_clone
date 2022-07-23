<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


use PDF;
use DB;
use App\Exports\RegistrationExport;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomReportController extends Controller
{
    public function simplePDF(){

     $registrations = DB::table('registrations')
    ->join('users', 'registrations.user_id', '=', 'users.id')
    ->join('courses','registrations.course_id','=','courses.id')
    ->join('levels', 'courses.level_id', '=', 'levels.id')
    ->join('days', 'courses.day_id', '=', 'days.id')
    ->join('times', 'courses.time_id', '=', 'times.id')
    ->join('classrooms', 'courses.classroom_id', '=', 'classrooms.id')
    ->orderBy('registrations.course_id')
    ->select(
      [
        'registrations.*',
        'users.name AS name',
        'users.surname AS surname',
        'courses.name AS course_name',
        'levels.level AS level',
        'days.day AS day',
        'times.time AS time',
        'classrooms.classroom AS classroom',
        ])->get();
        

        // example of pasing multiple variables to PDF generator
        // using the command 'compact'
        $document_title = 'Classrooms Report'; 
        $data = compact(['registrations', 'document_title']);
        $pdf = PDF::loadView('pdf.classroom_report', $data);
        return $pdf->download('classrooms_report.pdf');
    }

    public function export(){
      return Excel::download(new RegistrationExport, 'classrooms.xlsx');
    }
}