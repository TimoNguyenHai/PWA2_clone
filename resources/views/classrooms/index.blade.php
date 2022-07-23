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

      
    </div>
  </div>
</div>

<script type="text/javascript">

</script>

@endsection