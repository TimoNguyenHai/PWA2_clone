@extends('layouts.app-coreui')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">{{ __('lectors.update') }}
        </div>
        
        <div class="card-body">
          
          {!! Form::model($lectors, ['route' => ['lectors.update', $lectors->id], 'method' => 'PUT']) !!}
          
          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-text', ['space' => 'lectors', 'tag' => 'name'])
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-text', ['space' => 'lectors', 'tag' => 'surname'])
            </div>
          </div>


          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-text', ['space' => 'lectors', 'tag' => 'email'])
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-text', ['space' => 'lectors', 'tag' => 'tel_number'])
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