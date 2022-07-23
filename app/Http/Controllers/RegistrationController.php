<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Registration;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use App\Mail\CourseAdded;
use App\Models\User;


use Session;
use Auth;
use DB;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::with('users')
        ->join('users', 'courses.user_id', '=', 'users.id')
        ->join('levels', 'courses.level_id', '=', 'levels.id')
        ->join('days', 'courses.day_id', '=', 'days.id')
        ->join('times', 'courses.time_id', '=', 'times.id')
        ->join('classrooms', 'courses.classroom_id', '=', 'classrooms.id')
        ->select([
          'courses.*',
          'users.name AS lector_name',
          'users.surname AS lector_surname',
          'levels.level AS level_id',
          'days.day AS day_id',
          'times.time AS time_id',
          'classrooms.classroom AS classroom_id',
        ])->get();


        return view('registrations.create')
        ->with('listCourses',$this->listCourses())
        ->with('courses', $courses);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $validated = $request->validate(['course_id'=>'required']);
          
          try {
            $user_id = Auth::user()->id;
            $day_id = DB::table('courses')->select('day_id')->where('id','=',$request['course_id'])->pluck('day_id');
            $time_id = DB::table('courses')->select('time_id')->where('id','=',$request['course_id'])->pluck('time_id');

            $user = User::where('id','=',$user_id)->value('name');
            $course = DB::table('courses')->select('name')->where('id','=',$request['course_id'])->value('name');
            $day = DB::table('days')->select('day')->where('id','=',$day_id)->value('day');
            $time = DB::table('times')->select('time')->where('id','=',$time_id)->value('time');

            Registration::create([
                'user_id' => $user_id,
                'course_id'  => $request['course_id'],
            ]);
            $emailAddress = 'timonguyenhai@gmail.com';
            $data['name'] = $user;
            $data['course_name'] = $course;
            $data['day'] = $day;
            $data['time'] = $time;
            Mail::to($emailAddress)->send(new CourseAdded($data));
            
            Session::flash('success', __('Registration succeed'));
            return redirect('registrations/create'); // upravit
          } catch (\Exception $e) {
            // Session::flash('failure', $e->getMessage());
            Session::flash('failure', 'You are already registered to this course.');
            return redirect()->back()->withInput();

          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
