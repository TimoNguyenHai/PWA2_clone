<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\User;
use App\Models\Registration;
use DB;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Classroom::all()->pluck('classroom');
        $class1 = $class[0];
        $class2 = $class[1];
        $class3 = $class[2];
        $class4 = $class[3];

        $classrooms = Classroom::all()->pluck('id');
        $c1 = $classrooms[0];
        $c2 = $classrooms[1];
        $c3 = $classrooms[2];
        $c4 = $classrooms[3];        
        
        $courses1 = DB::table('courses')
        ->join('levels','levels.id','=','courses.level_id')
        ->select('courses.*','levels.level AS level')
        ->where('classroom_id',$c1)
        ->get();
        $courses2 = DB::table('courses')
        ->join('levels','levels.id','=','courses.level_id')
        ->select('courses.*','levels.level AS level')
        ->where('classroom_id',$c2)
        ->get();
        $courses3 = DB::table('courses')
        ->join('levels','levels.id','=','courses.level_id')
        ->select('courses.*','levels.level AS level')
        ->where('classroom_id',$c3)
        ->get();
        $courses4 = DB::table('courses')
        ->join('levels','levels.id','=','courses.level_id')
        ->select('courses.*','levels.level AS level')
        ->where('classroom_id',$c4)
        ->get();

        return view('classrooms.index')
        ->with('class',$class)        
        ->with('class1',$class1)->with('class2',$class2)->with('class3',$class3)->with('class4',$class4)
        ->with('classrooms',$classrooms)
        ->with('courses1',$courses1)->with('courses2',$courses2)->with('courses3',$courses3)->with('courses4',$courses4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id)->id;

        $class = Classroom::all()->pluck('classroom');
        $class1 = $class[0];
        $class2 = $class[1];
        $class3 = $class[2];
        $class4 = $class[3];

        $classrooms = Classroom::all()->pluck('id');
        $c1 = $classrooms[0];
        $c2 = $classrooms[1];
        $c3 = $classrooms[2];
        $c4 = $classrooms[3];        
        
        $courses1 = DB::table('courses')
        ->join('levels','levels.id','=','courses.level_id')
        ->select('courses.*','levels.level AS level')
        ->where('classroom_id',$c1)
        ->get();
        $courses2 = DB::table('courses')
        ->join('levels','levels.id','=','courses.level_id')
        ->select('courses.*','levels.level AS level')
        ->where('classroom_id',$c2)
        ->get();
        $courses3 = DB::table('courses')
        ->join('levels','levels.id','=','courses.level_id')
        ->select('courses.*','levels.level AS level')
        ->where('classroom_id',$c3)
        ->get();
        $courses4 = DB::table('courses')
        ->join('levels','levels.id','=','courses.level_id')
        ->select('courses.*','levels.level AS level')
        ->where('classroom_id',$c4)
        ->get();
        $info = DB::table('courses')
        ->join('classrooms','courses.classroom_id','=','classrooms.id')
        ->join('days','courses.day_id','=','days.id')
        ->join('times','courses.time_id','=','times.id')
        ->join('levels','courses.level_id','=','levels.id')
        ->select(
            'courses.name AS name',
            'classrooms.classroom AS classroom',
            'days.day AS day',
            'times.time AS time',
            'levels.level AS level'
        )->where('courses.id',$course)->get();       

        $students = DB::table('registrations')
        ->join('users','users.id','=','registrations.user_id')
        ->select('users.name','users.surname')
        ->where('course_id',$course)
        ->get();

        return view('classrooms.show')
        ->with('info',$info)
        ->with('class',$class)        
        ->with('class1',$class1)->with('class2',$class2)->with('class3',$class3)->with('class4',$class4)
        ->with('classrooms',$classrooms)
        ->with('courses1',$courses1)->with('courses2',$courses2)->with('courses3',$courses3)->with('courses4',$courses4)
        ->with('students',$students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
