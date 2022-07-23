@extends('layouts.app-coreui')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header"><strong>{{ __('lectors.list') }}</strong>
        </div>
        
        <div class="card-body">
          <div class="row">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th class="text-muted">#</th>
                  <th>{{__('lectors.name')}}</th>
                  <th>{{__('lectors.surname')}}</th>
                  <th>{{__('lectors.email')}}</th>
                  <th>{{__('lectors.tel_number')}}</th>
                  <th colspan="2">{{__('lectors.actions')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lectors as $l)
                <tr>
                  <td>{{$l->id}}</td>
                  <td>{{$l->name}}</td>
                  <td>{{$l->surname}}</td>
                  <td>{{$l->email}}</td>
                  <td>{{$l->tel_number}}</td>
                  
                  <td><a href="{{route('lectors.edit', $l->id)}}">{{__('lectors.edit')}}</a></td>
                  <td>
                    @if($l->deleted_at == null)
                    {!! Form::open(array('route' => ['lectors.destroy', $l->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('lectors.delete'), array('class' => 'btn btn-danger btn-ghost-danger my-0 py-0', 'onclick' => 'return confirm("You are about to delete the book.")' ))!!}
                    {!! Form::close() !!}     
                    @endif         
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
