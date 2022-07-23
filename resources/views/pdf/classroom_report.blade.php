<html>
<head>
	<style>
		/** Define the margins of your page **/
		@page {
			margin: 100px 50px;
		}

		header {
			position: fixed;
			top: -60px;
			left: 0px;
			right: 0px;
			height: 20px;

			/** Extra personal styles **/
			color: black;
			text-align: left;
			line-height: 15px;
			border-bottom: 1px #606060 solid;
			font-size: 9pt;
		}

		footer {
			position: fixed; 
			bottom: -70px; 
			left: 0px; 
			right: 0px;
			height: 30px; 

			/** Extra personal styles **/
			border-top: 1px #606060 solid;
			color: black;
			text-align: left;
			line-height: 20px;
			font-size: 9pt;
		}

		table {
			font-size: 9pt;
			width: 100%;
		}


		.page-break {
			page-break-after: always;
		}

		.nobreak {
			page-break-inside: avoid;
		}

		body { font-family: DejaVu Sans; }

	</style>
	<title>{{'Classrooms'}}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>

  <div class="page-break">

    <table class="table" cellspacing="0">
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
  </div>


</body>
</html>