<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;

class RegistrationExport implements FromView, ShouldAutoSize
{
  public function view(): View
  {
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
        
        return view('excel.registrations', [
          'registrations' => $registrations
        ]);
      }
      
    }


