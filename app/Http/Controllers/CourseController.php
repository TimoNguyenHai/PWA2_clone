<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Classroom;
use Auth;
use Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('courses');

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
        ])->orderBy('courses.id')->get();

        return view('courses.index')
        ->with('courses', $courses);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('courses');     
      
        return view('courses.create')
        ->with('lector_idList', $this->lector_idList())
        ->with('level_idList', $this->level_idList())
        ->with('day_idList', $this->day_idList())
        ->with('time_idList', $this->time_idList())
        ->with('classroom_idList', $this->classroom_idList());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->authorize('courses');

      $v = [
        'name'          => 'required',
        'name_short'    => 'required',
        'user_id'       => 'required',
        'level_id'      => 'required',
        'day_id'        => 'required',
        'time_id'       => 'required',
        'classroom_id'  => 'required',
      ];

      $validated = $request->validate($v); 

      $classroom = $request['classroom_id'];
      $f = Classroom::where('id','=',$classroom)->select('classroom')->get();
      $floor = substr($f,15);
        
      try {            
          Course::create([
            'name'          => $request['name'],
            'name_short'    => $request['name_short'],
            'user_id'       => $request['user_id'],
            'level_id'      => $request['level_id'],
            'day_id'        => $request['day_id'],
            'time_id'       => $request['time_id'],
            'classroom_id'  => $classroom,
            'floor'         => $floor[0],
            'seats'         => '10'
          ]);
        
          Session::flash('success', __('Course saved'));
          return redirect('courses');
      } 
      catch (\Exception $e) {
          Session::flash('failure', $e->getMessage());
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
        $this->authorize('courses');
             
        $courses = Course::find($id); 
        return view('courses.edit')->with('courses', $courses)
        ->with('listCourses', $this->listCourses())
        ->with('lector_idList', $this->lector_idList())
        ->with('level_idList', $this->level_idList())
        ->with('day_idList', $this->day_idList())
        ->with('time_idList', $this->time_idList())
        ->with('classroom_idList', $this->classroom_idList());
          
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
      $this->authorize('courses');
            $v = [
            'name'          => 'required',
            'name_short'    => 'required',
            'user_id'       => 'required',
            'level_id'      => 'required',
            'day_id'        => 'required',
            'time_id'       => 'required',
            'classroom_id'  => 'required',
            ];
            $validated = $request->validate($v);
        
            try {
              Course::find($id)->update($request->all());
              Session::flash('success', __('Course saved'));
              return redirect('courses');
            } catch (\Exception $e) {
              Session::flash('failure', $e->getMessage());
              return redirect()->back()->withInput();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('courses');
            
        Course::find($id)->delete();
        Session::flash('success', __('Course deleted')); 
        return redirect('courses'); 
        
    }
}