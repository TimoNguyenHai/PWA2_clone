@extends('layouts.app-coreui')

@section('content')

<style>
    .card-box {
        position: relative;
        color: #fff;
        padding: 20px 10px 40px;
        margin: 20px 0px;
    } 
    .card-box .inner {
        padding: 5px 10px 0 10px;
    }
    .card-box h3 {
        font-size: 27px;
        font-weight: bold;
    }
    .bg-blue {
        background-color: #50A9B7;
    }
    .bg-green {
        background-color: #63A04B;
    }
    .bg-orange {
        background-color: #C7953F;
    }
    .bg-red {
        background-color: #F46565;
    }
</style>


{{-- <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        
        
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            @include('templates.card-block', ['counter' => $lectors, 'title' => 'Number of lectors', 'gradient' => 'primary'])
          </div>
  
          <div class="col-sm-6 col-lg-3">
            @include('templates.card-block', ['counter' => $students, 'title' => 'Number of students', 'gradient' => 'info'])
          </div>
  
          <div class="col-sm-6 col-lg-3">
            @include('templates.card-block', ['counter' => $classrooms, 'title' => 'Number of classrooms', 'gradient' => 'success'])
          </div>
  
          <div class="col-sm-6 col-lg-3">
            @include('templates.card-block', ['counter' => $courses, 'title' => 'Number of courses', 'gradient' => 'danger'])
          </div>
  
        </div>
        
        
      </div>
    </div>
 </div> --}}

@can('statistics')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3>{{ $lectors }}</h3>
                        <p>Number of lectors</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3>{{ $students }}</h3>
                        <p>Number of students</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3>{{ $classrooms }}</h3>
                        <p>Number of classrooms</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3>{{ $courses }}</h3>
                        <p>Number of courses</p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endcan

@can('welcome')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card" style="text-align: center; font-size: 13pt;">

                    @if($registrations->count() > 0)
                        
                        <div class="card-header">
                            <strong>{{ __('Your actual courses') }}</strong>
                        </div>

                        <div class="card-body">
                            @foreach ($registrations as $r)
                                <dl>
                                    {{ $r->course }} - {{ $r->level }}
                                </dl>
                            @endforeach
                        </div>

                    @else
                        <div class="card-header">
                            <strong>{{ __('Welcome to our Language School D&T! :)') }}</strong>
                            <p></p>
                            <strong><a href="{{route('registrations.create')}}">{{ __('Register') }}</a>{{ __(' your first course.') }}
                        </div>
                            
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
@endcan

@endsection
