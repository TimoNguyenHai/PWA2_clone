@extends('layouts.app-coreui')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        
        <div class="card-body">

          <div style="text-align: center;"><strong>{{ __('Classrooms') }}</strong></div>
          <p></p>

          <table class="table table-responsive-sm">
                  
            <td style="text-align: center;">
              <strong>{{ $class1 }}</strong>
              <p></p>
              @foreach ($courses1 as $c1)
                <dl><a href="{{route('classrooms.show', $c1->id)}}" class="btn">{{ $c1->name }} <i>({{ $c1->level }})</i></a></dl>
              @endforeach  
            </td>
            <td style="text-align: center;">
              <strong>{{ $class2 }}</strong>
              <p></p>
              @foreach ($courses2 as $c2)
                <dl><a href="{{route('classrooms.show', $c2->id)}}" class="btn">{{ $c2->name }} <i>({{ $c2->level }})</i></a></dl>  
              @endforeach 
            </td>
            <td style="text-align: center;">
              <strong>{{ $class3 }}</strong>
              <p></p>
              @foreach ($courses3 as $c3)
              <dl><a href="{{route('classrooms.show', $c3->id)}}" class="btn">{{ $c3->name }} <i>({{ $c3->level }})</i></a></dl>  
              @endforeach 
            </td>     
            <td style="text-align: center;">
              <strong>{{ $class4 }}</strong>
              <p></p>
              @foreach ($courses4 as $c4)
              <dl><a href="{{route('classrooms.show', $c4->id)}}" class="btn">{{ $c4->name }} <i>({{ $c4->level }})</i></a></dl>   
              @endforeach 
            </td>  

          </table>

        </div>

        
        {{-- Show after click --}}
        
        <hr>
          
        <div class="card-body" id="appear" style="text-align:center;">
         
          <table class="table table-responsive-sm table-borderless">
            <tr>
              <th>{{ __('Course') }}</th>
              <th>{{ __('Classroom') }}</th>
              <th>{{ __('Day') }}</th>
              <th>{{ __('Time') }}</th>
              <th>{{ __('Level') }}</th>
            </tr>
            <tr>
              @foreach ($info as $i)
                <td>{{ $i->name }}</td>
                <td>{{ $i->classroom }}</td>
                <td>{{ $i->day }}</td>
                @if ($i->time == 'am')
                  <td>9:00 - 11:00</td>
                @else
                  <td>14:00 - 16:00</td>
                @endif                  
                <td>{{ $i->level }}</td>
              @endforeach                            
            </tr>
          </table>
          
          @can('list_student')
          <hr>
            <table class="table table-responsive-sm table-borderless">
              <tr>
                <th>{{ __('Students') }}</th>
              </tr>
              @foreach ($students as $s)
                <tr><td>{{ $s->name }} {{ $s->surname }}</td></tr>
              @endforeach
            </table>
          @endcan
        </div>
      
    </div>
  </div>
</div>

@endsection