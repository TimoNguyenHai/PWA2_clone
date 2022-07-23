@extends('layouts.app-coreui')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">{{ __('courses.create') }}
        </div>
        
        <div class="card-body">
          
          {!! Form::open(array('route' => 'courses.store')) !!}
          
          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-text', ['space' => 'courses', 'tag' => 'name'])
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-text', ['space' => 'courses', 'tag' => 'name_short'])
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-select', ['space' => 'courses', 'tag' => 'user_id', 'list' => $lector_idList])
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-select', ['space' => 'courses', 'tag' => 'level_id', 'list' => $level_idList])
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-select', ['space' => 'courses', 'tag' => 'day_id', 'list' => $day_idList])
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-select', ['space' => 'courses', 'tag' => 'time_id', 'list' => $time_idList])
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-select', ['space' => 'courses', 'tag' => 'classroom_id', 'list' => $classroom_idList])
            </div>
          </div>
          
          <div class="card-footer">
            {{ Form::submit('Submit', array('class' => 'btn btn-sm btn-primary')) }}
          </div>
          
          {!! Form::close() !!}
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection