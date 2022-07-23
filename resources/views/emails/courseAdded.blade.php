@extends('emails.layout')

@section('content')
<span class="preheader">
  Email Preview
</span>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
  <tr>
    <td>&nbsp;</td>
    <td class="container">
      <div class="content">
        
        <!-- START CENTERED WHITE CONTAINER -->
        <table role="presentation" class="main">
          
          <!-- START MAIN CONTENT AREA -->
          <tr>
            <td class="wrapper">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <p>Dear <strong>{{$data['name']}}, </p>
                      <p>This email confirms your new course with the name <strong>{{$data['course_name']}}</strong> on <strong>{{$data['day']}}</strong> at <strong>@if($data['time']=='am'){{'9:00 - 11:00'}} @else {{'14:00 - 16:00'}} @endif</strong> has beed added.
                        We will send you informations about the course via mail soon!. Please pay the course fee <strong>(100€)</strong> as soon as posssible. </a> 
                      </p>
                      <p>Best regards,</p>
                      <p>D&T Team</p>
                    </td>
                  </tr>
              </table>
            </td>
          </tr>
          
          <!-- END MAIN CONTENT AREA -->
        </table>
        <!-- END CENTERED WHITE CONTAINER -->
        
        <!-- START FOOTER -->
        <div class="footer">
          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="content-block">
                <span class="apple-link">D&T Team</span>
                <br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif">Unsubscribe</a>.
              </td>
            </tr>
            <tr>
              <td class="content-block powered-by">
                Powered by <a href="http://htmlemail.io">Language school - Booking System</a>.
              </td>
            </tr>
          </table>
        </div>
        <!-- END FOOTER -->
        
      </div>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
@endsection