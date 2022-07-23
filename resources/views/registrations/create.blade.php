@extends('layouts.app-coreui')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
     
        
        <div class="card-body">
          
          {!! Form::open(array('route' => 'registrations.store')) !!}

          <div class="row">
            <div class="col-sm-4">
              @include('templates.form-select', ['space' => 'registrations', 'tag' => 'course_id', 'list' => $listCourses])
            </div>
          </div>
          
          {{-- <div class="card-footer"> --}}
            {{ Form::submit('Submit', array('class' => 'btn btn-sm btn-primary')) }}
          {{-- </div> --}}
          
          {!! Form::close() !!}
          
        </div>

        <hr>
        
        <div class="card-header"><strong>{{ __('registrations.my_courses') }}</strong>
        </div>

        <div class="card-body">
          <div class="row">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th class="text-muted">{{__('No.')}}</th>
                  <th>{{__('Course Name')}}</th>
                  <th>{{__('Name Short')}}</th>
                  <th>{{__('Lector')}}</th>
                  <th>{{__('Level')}}</th>
                  <th>{{__('Day')}}</th>
                  <th>{{__('Time')}}</th>
                  <th>{{__('Classroom')}}</th>
                  <th>{{__('Floor')}}</th>
                  <th>{{__('Seats')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courses as $b)
                <tr>
                  <td class="text-muted">{{$b->id}}</td>
                  <td>{{$b->name}}</td>
                  <td>{{$b->name_short}}</td>
                  <td>{{$b->lector_name}}&nbsp;{{$b->lector_surname}}</td>
                  <td>{{$b->level_id}}</td>
                  <td>{{$b->day_id}}</td>
                  <td>{{$b->time_id}}</td>
                  <td>{{$b->classroom_id}}</td>
                  <td>{{$b->floor}}</td>
                  <td>
                     {{$b->seats}}
                  </td>
                </tr>                  
                @endforeach
              </tbody>
            </table> 
            
          </div>
          
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
