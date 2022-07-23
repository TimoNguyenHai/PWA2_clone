
<table>
  <thead>
    <tr>
      <th class="text-muted">{{__('No.')}}</th>
      <th>{{__('Name')}}</th>
      <th>{{__('Surname')}}</th>
      <th>{{__('Course Name')}}</th>
      <th>{{__('Level')}}</th>
      <th>{{__('Day')}}</th>
      <th>{{__('Time')}}</th>
      <th>{{__('Classroom')}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($registrations as $b)
    <tr>
      <td>{{$b->id}}</td>
      <th>{{$b->name}}</th>
      <th>{{$b->surname}}</th>
      <th>{{$b->course_name}}</th>
      <th>{{$b->level}}</th>
      <th>{{$b->day}}</th>
      <th>{{$b->time}}</th>
      <th>{{$b->classroom}}</th>

    </tr>                  
    @endforeach
  </tbody>
</table> 
