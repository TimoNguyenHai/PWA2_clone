<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Course;
use App\Models\Classroom;
use App\Models\Day;
use App\Models\User;
use App\Models\Level;
use App\Models\Time;
use DB;

use App\Exports\RegistrationExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Zoznam krajin
    protected function listCountries(){
        $countries = Country::all();
        $list = [];
        foreach($countries as $c){
            $list[$c->id] = $c->country;
        }
        return $list;
    }

    // Zoznam kurzov
    protected function listCourses(){
        $courses = DB::table('courses')
        ->join('levels','levels.id','=','courses.level_id')
        ->select('courses.*','levels.level AS level')
        ->get();
        $list = [];
        foreach($courses as $c){
            $list[$c->id] = $c->name.' - '.$c->level;
        }
        return $list;
    }

    // Zoznam lektorov
    protected function lector_idList(){
        $lector_id = User::all()->where('is_admin','=','1');
        $list = [];
        foreach($lector_id as $a){
            $list[$a->id] = $a->name.' '.$a->surname;
        }
        return $list;
    }
    
    // Zoznam urovni
    protected function level_idList(){
        $level_idList = Level::all();
        $list = [];
        foreach($level_idList as $a){
            $list[$a->id] = $a->level;
        }
        return $list;
    }

    // Zoznam dni
    protected function day_idList(){
        $day_idList = Day::all();
        $list = [];
        foreach($day_idList as $a){
            $list[$a->id] = $a->day;
        }
        return $list;
    }

    // Zoznam casov
    protected function time_idList(){
        $time_idList = Time::all();
        $list = [];
        foreach($time_idList as $a){
            $list[$a->id] = $a->time;
        }
        return $list;
    }

    // Zoznam tried 
    protected function classroom_idList(){
        $classroom_idList = Classroom::all();
        $list = [];
        foreach($classroom_idList as $a){
            $list[$a->id] = $a->classroom;
        }
        return $list;

    }

    public function export() {
        return Excel::download(new RegistrationExport, 'registration.xlsx');
    }

}
