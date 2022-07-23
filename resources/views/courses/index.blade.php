@extends('layouts.app-coreui')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>{{ __('Course List') }}</strong>
          <div class="card-header-actions">
            <a class="theme-color" href="{{route('registration.export.excel')}}">
              <i class="cil-vertical-align-bottom"></i>&nbsp;{{__('registrations.download_excel')}}
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{route('classroom_report.report.simplePDF')}}">
              <i class="cil-vertical-align-bottom"></i>
              {{__('Classroom report PDF download')}}
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="theme-color" href="{{route('courses.create')}}"><i class="cil-note-add"></i>&nbsp;{{__('Create course')}}</a>
          
          </div>
        </div>
        
        <div class="card-body">
          <div class="row">
            @if($courses->count() > 0)
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
                  <th>{{__('Actions')}}</th>
                  <th colspan="2"></th>
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
                  <td>{{$b->seats}}</td>

                  <td>{!! Html::linkRoute('courses.edit', __('Edit'), ['course' => $b->id], array('class' => 'theme-color' )) !!}</td>
                  <td>
                    {!! Form::open(array('route' => ['courses.destroy', $b->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('Delete'), array('class' => 'btn btn-danger btn-ghost-danger my-0 py-0', 'onclick' => 'return confirm("You are about to delete the course.")' ))!!}
                    {!! Form::close() !!}
                  </td>
                </tr>                  
                @endforeach
              </tbody>
            </table> 
            {{-- {{ $courses->links('vendor.pagination.bootstrap-4') }} --}}
            @else
            Start with insert a course into the database.
            @endif
            
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection