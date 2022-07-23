<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\User;
use App\Models\Course;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $registrations = DB::table('registrations')
        ->join('courses','courses.id','=','registrations.course_id')
        ->join('levels','levels.id','=','courses.level_id')
        ->select(
            'courses.name AS course',
            'registrations.user_id',
            'levels.level AS level')
        ->where('registrations.user_id','=',$user_id)
        ->get();

        $lectors = User::all()->where('is_admin','=','1')->count();
        $students = User::all()->where('is_admin','=','0')->count();
        $classrooms = Classroom::all()->count();
        $courses = Course::all()->count();
        
        return view('home')
        ->with('students',$students)
        ->with('lectors',$lectors)
        ->with('classrooms',$classrooms)
        ->with('courses',$courses)
        ->with('registrations',$registrations);
    }
}
